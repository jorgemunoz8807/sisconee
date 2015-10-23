<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 26/01/2015
 * Time: 10:47
 */

namespace sisconee\AppBundle\Controller;

use sisconee\AppBundle\Entity\Entidad;
use sisconee\AppBundle\Entity\PlanMensualServicio;
use sisconee\AppBundle\Form\PlanMensualType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * PlanMensualEntidad controller.
 *
 */
class PlanMensualServicioController extends PlanificacionController
{

    /**
     * Provides a view that allows to distribute monthly plans to subordinate services...
     * @return Response that represents the view
     */
    public function indexAction($entityId, $serviceId)
    {
        //checking control access
        if (!$this->isLogged_PlanificadorSuperior() && !$this->isLogged_PlanificadorEntidad() && !$this->isLogged_PlanificadorServicio()
        ) {
            var_dump('Sin acceso');

            return;
        }

        //getting current configuration and user data
        $currentConfiguration = $this->getCurrentConfiguration();
        $valid = $this->validateConfiguration($currentConfiguration, 'Planificaci�n');
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
        $mensualPlans = null;
        $currentService = null;

        //getting subordinated services and monthly plans
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
                $mensualPlans = $em->getRepository(
                    'sisconeeAppBundle:PlanMensualServicio'
                )->getMonthlyPlansOfAServiceInAYear(
                    $currentService,
                    $currentYear
                );
            }
        }

        //getting reference and remaining plan
        $referencePlan = is_null($currentService) ? null : $this->getServiceReferencePlan($currentService, $currentYear);
        $remaining = is_null($currentService) ? null : $this->getServiceRemainingPlan($currentService, $currentYear);

        //getting monthly plan form
        $generalPlans = $error ? null : $this->organizePlansByMonth($mensualPlans)['generalPlans'];
        $hpPlans = $error ? null : $this->organizePlansByMonth($mensualPlans)['hpPlans'];
        $arrayData = $error ? [] : ['plans' => $generalPlans, 'hpPlans' => $hpPlans];
        $plans_form = $this->createCreateForm($arrayData, $error ? null : $parentEntity->getId(), $error ? null : $currentService->getId());

        return $this->render(
            'sisconeeAppBundle:PlanMensualServicio:index.html.twig',
            array(
                'parentEntity' => $parentEntity,
                'entities' => $parentEntities,
                'fixedEntity' => $fixedEntity,
                'generalPlan' => $referencePlan,
                'remaining' => $remaining,
                'selectedService' => $currentService,
                'services' => $services,
                'plans_form' => $plans_form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a PlanMensualServicio entity.
     *
     * @param array $mensualPlans The general and hp plans
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(array $mensualPlans, $entityId, $serviceId)
    {
        $service = $this->getDoctrine()->getManager()->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);
        $plans_form = $this->createForm(
            new PlanMensualType($entityId, $serviceId, $service->getHorarioPico()),
            $mensualPlans,
            array(
                'action' => $this->generateUrl('planmensualservicio_create'),
                'method' => 'POST',
            )
        );

        return $plans_form;
    }

    /**
     * Create, update or delete the PlanMensualServicio entities.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceId = $request->request->get('sisconee_appbundle_planesmensuales')['serviceId'];
        $entityId = $request->request->get('sisconee_appbundle_planesmensuales')['entityId'];
        $service = $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);

        //handling the request
        $tmpGeneralPlans = [];
        $tmpHpPlans = [];
        for ($i = 1; $i <= 12; $i++) {
            $tmpGeneralPlans[$i] = null;
            $tmpHpPlans[$i] = null;
        }
        $tmpPlansArray = ['plans' => $tmpGeneralPlans, 'hpPlans' => $tmpHpPlans];
        $form = $this->createCreateForm($tmpPlansArray, $entityId, $serviceId);
        $form->handleRequest($request);

        //persisting submitted plans
        if ($form->isValid()) {
            $plansArray = $form->getData();
            $error = $this->checkPlansForService($em, $plansArray['plans'], $plansArray['hpPlans'], $service, $this->getCurrentConfiguration()->getPeriodoTrabajo());
            if (is_null($error)) {
                $this->saveMensualPlansForService($plansArray, $serviceId);
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

        return $this->indexAction($entityId, $serviceId);
    }

    private function checkPlansForService($em, array $plans, array $hpPlans, $service, $year)
    {
        $total = 0;
        for ($m = 1; $m <= 12; $m++) {
            if ($plans[$m] < 0) {
                return 'Plan general del mes ' . $m . ' es negativo';
            }
            if ($hpPlans[$m] < 0) {
                return 'Plan en horario pico del mes ' . $m . ' es negativo';
            }
            if ($plans[$m] < $hpPlans[$m]) {
                return 'Plan en horario pico del mes ' . $m . ' excede al plan general';
            }

            $total += $plans[$m];
        }

        $generalPlan = $this->getServiceReferencePlan($service, $year);

        if ($total > $generalPlan) {
            return 'Los planes exceden el total permitido.';
        }

        return null;
    }

    private function saveMensualPlansForService($plansArray, $serviceId)
    {
        $em = $this->getDoctrine()->getManager();

        //gettting data
        $currentConfiguration = $this->getCurrentConfiguration();
        if ($currentConfiguration == null) {
            var_dump('NO CONFIG');

            return; //No existe config para el actual org...link para crear nva config
        }
        $currentYear = $currentConfiguration->getPeriodoTrabajo();
        $generalPlans = $plansArray['plans'];
        $hpPlans = $plansArray['hpPlans'];
        $service = $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId);

        for ($m = 1; $m <= 12; $m++) {
            $this->updateMonthlyPlan($em, $service, $m, $currentYear, $generalPlans[$m], $hpPlans[$m]);
        }
    }

    private function isNullOrEmpty($str)
    {
        return $str == null || $str == '';
    }

    private function updateMonthlyPlan($em, $service, $month, $year, $plan, $hpPlan)
    {
        $monthlyPlan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->getPlanOfAServiceInAMonthYear(
            $service,
            $month,
            $year
        );
        if ($monthlyPlan == null) {
            if (!$this->isNullOrEmpty($plan) || !$this->isNullOrEmpty($hpPlan != null)) { // create a new plan
                $newMensualPlan = new PlanMensualServicio();
                $newMensualPlan->setServicio($service);
                $newMensualPlan->setAnno($year);
                $newMensualPlan->setMes($month);
                $newMensualPlan->setPlan($plan);
                $newMensualPlan->setPlanHorarioPico($hpPlan);
                $em->persist($newMensualPlan);
                $em->flush();

                //Register Log
                $current_user = $this->getCurrentUser();
                $data = $newMensualPlan->getPlan() . ',' . $newMensualPlan->getPlanHorarioPico() . ',' . $newMensualPlan->getServicio() . ',' . $newMensualPlan->getMes() . ',' . $newMensualPlan->getAnno();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Añadir', 'plan_mensual_servicio', $newMensualPlan->getId(), $data, $current_user);


            }
        } else {
            if ($this->isNullOrEmpty($plan) && $this->isNullOrEmpty($hpPlan)) { // delete an existent plan
                $id = $monthlyPlan->getId();
                $em->remove($monthlyPlan);
                $em->flush();


                //Register Log
                $current_user = $this->getCurrentUser();
                $data = $monthlyPlan->getPlan() . ',' . $monthlyPlan->getPlanHorarioPico() . ',' . $monthlyPlan->getServicio() . ',' . $monthlyPlan->getMes() . ',' . $monthlyPlan->getAnno();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Eliminar', 'plan_mensual_servicio', $id, $data, $current_user);


            } else { // update an existent plan

                if($monthlyPlan->getPlan()!=$plan || $monthlyPlan->getPlanHorarioPico()!=$hpPlan ){
                $monthlyPlan->setPlan($plan);
                $monthlyPlan->setPlanHorarioPico($hpPlan);
                $em->persist($monthlyPlan);
                $em->flush();

                 //Register Log
                $current_user = $this->getCurrentUser();
                $data = $monthlyPlan->getPlan() . ',' . $monthlyPlan->getPlanHorarioPico() . ',' . $monthlyPlan->getServicio() . ',' . $monthlyPlan->getMes() . ',' . $monthlyPlan->getAnno();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Actualizar', 'plan_mensual_servicio', $monthlyPlan->getId(), $data, $current_user);
            }}
        }
    }


}