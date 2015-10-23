<?php

namespace sisconee\AppBundle\Controller;

use sisconee\AppBundle\Entity\PlanDayServices;
use sisconee\AppBundle\Entity\PlanDiarioServicio;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sisconee\AppBundle\Entity\Entidad;

use sisconee\AppBundle\Entity\LecturaDiariaServicio;
use sisconee\AppBundle\Form\PlanDiarioServicioType;
use sisconee\AppBundle\Controller\PlanificacionController;
use Symfony\Component\Validator\Constraints\Date;

//use Symfony\Component\Validator\Constraints\DateTime;

/**
 * PlanDiarioServicio controller.
 *
 */
class PlanDiarioServicioController extends PlanificacionController
{

    /**
     * Provides a view that allows to distribute the monthly plans of services in days...
     * @return Response that represents the view
     */
    public function indexAction($entityId, $serviceId, $month, $week)
    {
        //getting current configuration and user data
        $currentConfiguration = $this->getCurrentConfiguration();
        $valid = $this->validateConfiguration($currentConfiguration, 'Planificación');
        if(!$valid)
            return $this->render('sisconeeAppBundle:Default:errorConfiguration.html.twig');

        $em = $this->getDoctrine()->getManager();
        $currentOrganismId = $this->getOrganismOfCurrentUser()->getId();
        $currentYear = $currentConfiguration->getPeriodoTrabajo();
        $error = false;
        //getting parent entities
        $parentEntities = null;
        $parentEntity = null;

        if ($this->isLogged_PlanificadorSuperior()) {
            $entities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllEntitiesWithServicesBelongingTo(
                $currentOrganismId
            );
            if (sizeOf($entities) <= 0) {
                $fixedEntity = false;
                $this->get('session')->getFlashBag()->add(
                    'warning',
                    'No existen entidades con entidades subordinadas que puedan asignar planes.'
                );

                $error = true;
            } else {
                $fixedEntity = false;
                $parentEntities = $this->setInFirstPlaceBaseEntity($entities);

                if (!is_null($entityId))
                    $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($entityId);
                else
                    $parentEntity = $parentEntities[0];
            }
        } else //PlanificadorEntidad || PlanificadorServicio
        {
            $parentEntity = $this->getEntityOfCurrentUser();
            $fixedEntity = true;
        }

        $services = null;
        $dailyPlans = null;
        $currentService = null;

        $date = date_create();
        date_date_set($date, $currentYear, 1, 1);

        //getting subordinated services
        if (!is_null($parentEntity)) {
            $services = $em->getRepository('sisconeeAppBundle:Servicio')->findAllDirectlyBelongTo($parentEntity);

            if (sizeOf($services) <= 0) {
                $this->get('session')->getFlashBag()->add(
                    'warning',
                    'La entidad ' . $parentEntity . ' no tiene servicios para asignarles plan.'
                );

                $error = true;
            } else {
                $currentService = is_null($serviceId) ? $services[0] :
                    $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);
            }
        }

        //getting current date
        $currentMonth = 1;
        $currentWeek = 1;
        if (!is_null($month)) {
            $currentMonth = $month;
        }

        if (!is_null($week)) {
            $currentWeek = $week;
        }


        //getting daily plans
        if (!is_null($currentService)) {
            $dailyPlans = $em->getRepository(
                'sisconeeAppBundle:PlanMensualServicio'
            )->getDailyPlansOfAServiceInAMonth(
                $currentService,
                $currentMonth
            );
        }

        //getting reference and remaining plan
        $referencePlan = is_null($currentService) ? null : $this->getServiceReferenceMonthlyPlan($currentService, $currentMonth, $currentYear);
        $remaining = is_null($currentService) ? null : $this->getServiceRemainingMonthlyPlan($currentService, $currentMonth, $currentYear);

        //getting daily plans form
        $plan = $this->organizePlansByDay($dailyPlans)['generalPlans'];
        $plan_pico = $this->organizePlansByDay($dailyPlans)['hpPlans'];
        $data = ['plans' => $plan, 'hpPlans' => $plan_pico, 'year' => $currentYear, 'month' => $currentMonth, 'week' => $currentWeek, 'serviceId' => $currentService->getId(), 'entityId' => $parentEntity->getId()];
        $plans_form = $this->createCreateForm($data);

        return $this->render(
            'sisconeeAppBundle:PlanDiarioServicio:index.html.twig',
            array(
                'parentEntity' => $parentEntity,
                'entities' => $parentEntities,
                'fixedEntity' => $fixedEntity,
                'generalPlan' => $referencePlan,
                'remaining' => $remaining,
                'selectedService' => $currentService,
                'services' => $services,
                'year' => $currentYear,
                'selectedWeek' => $currentWeek,
                'selectedMonth' => $currentMonth,
                'plans_form' => $plans_form->createView(),
            )
        );

    }

    /**
     * Create, update or delete the daily plans...
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $serviceId = $request->request->get('sisconee_appbundle_lecturadiariaservicio')['serviceId'];
        $entityId = $request->request->get('sisconee_appbundle_lecturadiariaservicio')['entityId'];
        $year = $request->request->get('sisconee_appbundle_lecturadiariaservicio')['year'];
        $month = $request->request->get('sisconee_appbundle_lecturadiariaservicio')['month'];
        $week = $request->request->get('sisconee_appbundle_lecturadiariaservicio')['week'];


        //handling the request
        $tmpGeneralPlans = [];
        $tmpHpPlans = [];
        for ($i = 1; $i <= 31; $i++) {
            $tmpGeneralPlans[$i] = null;
            $tmpHpPlans[$i] = null;
        }
        $tmpDataArray = ['plans' => $tmpGeneralPlans, 'hpPlans' => $tmpHpPlans, 'year' => $year, 'month' => $month, 'week' => $week, 'serviceId' => $serviceId, 'entityId' => $entityId];
        $form = $this->createCreateForm($tmpDataArray);
        $form->handleRequest($request);

        //persisting submitted plans
        if ($form->isValid()) {
            $dataArray = $form->getData();
            $plans = $dataArray['plans'];
            $hpPlans = $dataArray['hpPlans'];
            $error = $this->checkPlansForService($em, $plans, $hpPlans, $serviceId, $month, $year);
            if (is_null($error)) {
                $this->saveDailyPlansForService($plans, $hpPlans, $serviceId, $month, $year);
            } else {
                // show error and dont save
                $this->get('session')->getFlashBag()->add(
                    'warning',
                    $error
                );
            }
        } else {
            var_dump('invalid form');
        }

        return $this->indexAction($entityId, $serviceId, $month, $week);
    }

    private function checkPlansForService($em, array $plans, array $hpPlans, $serviceId, $month, $year)
    {
        $total = 0;
        for ($d = 1; $d <= 31; $d++) {
            if ($plans[$d] < 0) {
                return 'Plan general del día ' . $d . ' es negativo';
            }
            if ($hpPlans[$d] < 0) {
                return 'Plan en horario pico del día ' . $d . ' es negativo';
            }
            if ($plans[$d] < $hpPlans[$d]) {
                return 'Plan para horario pico del día ' . $d . ' excede al plan general';
            }

            $total += $plans[$d];
        }

        $service = $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);
        $generalPlan = $this->getServiceReferenceMonthlyPlan($service, $month, $year);

        if ($total > $generalPlan) {
            return 'Los planes exceden el total permitido.' . $total . '---' . $generalPlan;
        }

        return null;
    }

    private function saveDailyPlansForService($plans, $hpPlans, $serviceId, $month, $year)
    {
        $em = $this->getDoctrine()->getManager();

        $service = $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);

        $date = date_create();
        for ($d = 1; $d <= 31; $d++) {
            date_date_set($date, $year, $month, $d);
            date_time_set($date, 0, 0, 0);
            $this->updateDailyPlan($em, $service, $date, $plans[$d], $hpPlans[$d]);
        }
    }

    private function isNullOrEmpty($str)
    {
        return $str == null || $str == '';
    }

    private function updateDailyPlan($em, $service, $date, $plan, $hpPlan)
    {
        $dailyPlan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->getPlanOfAServiceInADate(
            $service,
            $date
        );

        if ($dailyPlan == null) {
            if (!$this->isNullOrEmpty($plan) || !$this->isNullOrEmpty($hpPlan != null)) { // create a new plan
                $newDailyPlan = new LecturaDiariaServicio();
                $newDailyPlan->setIdServicio($service);
                $newDailyPlan->setPlan($plan);
                $newDailyPlan->setPlanHorarioPico($hpPlan);
                $newDailyPlan->setFecha($date);
                $em->persist($newDailyPlan);
                $em->flush();

                //Register Log
                $current_user = $this->getCurrentUser();
                $date = $newDailyPlan->getFecha()->format('Y-m-d ');
                $data = $plan . ',' . $hpPlan . ',' . $service . ',' . $date;
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Añadir', 'plan_diario_servicio', $newDailyPlan->getId(), $data, $current_user);

            }
        } else {
            if ($this->isNullOrEmpty($plan) && $this->isNullOrEmpty($hpPlan)) { // delete an existent plan
                $em->remove($dailyPlan);
                $em->flush();
                //Register Log
                $id = $dailyPlan->getId();
                $current_user = $this->getCurrentUser();
                $date = $dailyPlan->getFecha()->format('Y-m-d ');
                $data = $dailyPlan->getPlan() . ',' . $dailyPlan->getPlanHorariopico() . ',' . $service . ',' . $date;
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Eliminar', 'plan_diario_servicio', $id, $data, $current_user);


            } else { // update an existent plan
                if ($dailyPlan->getPlan() != $plan || $dailyPlan->getPlanHorarioPico()!=$hpPlan ) {

                    $dailyPlan->setPlan($plan);
                    $dailyPlan->setPlanHorarioPico($hpPlan);
                    $em->persist($dailyPlan);
                    $em->flush();

                    //Register Log
                    $current_user = $this->getCurrentUser();
                    $date = $dailyPlan->getFecha()->format('Y-m-d ');
                    $data = $dailyPlan->getPlan() . ',' . $dailyPlan->getPlanHorariopico(
                        ) . ',' . $service . ',' . $date;
                    $em->getRepository('sisconeeAppBundle:Trazas')->persistLog(
                        'Actualizar',
                        'plan_diario_servicio',
                        $dailyPlan->getId(),
                        $data,
                        $current_user
                    );
                }
            }
        }
    }

    /**
     * Creates a form to create a LecturaDiariaServicio entity.
     *
     * @param LecturaDiariaServicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(array $plans)
    {

        $plans_form = $this->createForm(
            new PlanDiarioServicioType(),
            $plans,
            array(
                'action' => $this->generateUrl('plandiarioservicio_create'),
                'method' => 'POST',
            )
        );


        return $plans_form;
    }

    /**
     * Displays a form to create a new LecturaDiariaServicio entity.
     *
     */
    public function newAction()
    {
        $entity = new LecturaDiariaServicio();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'sisconeeAppBundle:LecturaDiariaServicio:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a LecturaDiariaServicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LecturaDiariaServicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAppBundle:LecturaDiariaServicio:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing LecturaDiariaServicio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LecturaDiariaServicio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAppBundle:LecturaDiariaServicio:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a LecturaDiariaServicio entity.
     *
     * @param LecturaDiariaServicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(LecturaDiariaServicio $entity)
    {
        $form = $this->createForm(
            new PlanDiarioServicioType(),
            $entity,
            array(
                'action' => $this->generateUrl('lecturadiariaservicio_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing LecturaDiariaServicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LecturaDiariaServicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lecturadiariaservicio_edit', array('id' => $id)));
        }

        return $this->render(
            'sisconeeAppBundle:LecturaDiariaServicio:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a LecturaDiariaServicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LecturaDiariaServicio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('lecturadiariaservicio'));
    }

    /**
     * Creates a form to delete a LecturaDiariaServicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lecturadiariaservicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
