<?php

namespace sisconee\AppBundle\Controller;

use sisconee\AdministracionBundle\Controller\BaseUserController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use sisconee\AppBundle\Entity\PlanAnualServicio;
use sisconee\AppBundle\Form\EditPlanAnualServicioType;
use sisconee\AppBundle\Entity\Entidad;
use sisconee\AppBundle\Form\PlanAnualServicioType;
use Symfony\Component\HttpFoundation\Response;

/**
 * PlanAnualServicio controller.
 *
 */
class PlanAnualServicioController extends PlanificacionController
{

    /**
     * Provides a view that allows to distribute annual plans to subordinate services...
     * @return Response that represents the view
     */
    public function indexAction($id)
    {
        //checking control access
        if(!$this->isLogged_PlanificadorSuperior() && !$this->isLogged_PlanificadorEntidad()){
            var_dump('Sin acceso');
            return;
        }

        //getting current configuration and user data
        $currentConfiguration = $this->getCurrentConfiguration();
        $valid = $this->validateConfiguration($currentConfiguration, 'Planificación');
        if(!$valid)
            return $this->render('sisconeeAppBundle:Default:errorConfiguration.html.twig');

        $em = $this->getDoctrine()->getManager();
        $currentOrganismId = $this->getOrganismOfCurrentUser()->getId();
        $currentYear = $currentConfiguration->getPeriodoTrabajo();

        //getting parent entities
        $parentEntities = null;
        if($this->isLogged_PlanificadorSuperior())
        {
            $entities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllEntitiesWithServicesBelongingTo($currentOrganismId);

            if(sizeOf($entities)<=0)
            {
                $parentEntity = $this->getEntityOfCurrentUser();
                $fixedEntity = false;
                $this->get('session')->getFlashBag()->add('warning', 'No hay entidades pertenecientes al organismo con servicios para asignarles plan');
            }

            else {
               /* $parentEntities = $entities;
                $parentEntities = $this->setInFirstPlaceBaseEntity($parentEntities);
                $parentEntity = $parentEntities[0];
                $fixedEntity = false;*/
                $parentEntities = $this->setInFirstPlaceBaseEntity($entities);
                if (!is_null($id))
                    $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($id);
                else
                    $parentEntity = $parentEntities[0];
                $fixedEntity = false;
            }

        }
        else//if($this->isLogged_PlanificadorEntidad())
        {
            $parentEntity = $this->getEntityOfCurrentUser();
            $fixedEntity = true;
        }

        //getting the reference and remaining plan
        $plan = $this->getEntityReferencePlan($parentEntity, $currentYear);
        if(is_null($plan))
        {
            $this->get('session')->getFlashBag()->add('warning', 'Su entidad no tiene plan asignado aún.');
            $remaining = null;
            $annualPlans = [];
        }
        else
        {
            $annualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getAnnualPlansOfServicesBelongingTo($parentEntity, $currentYear);
            $remaining = $this->getEntityRemainingPlan($parentEntity, $currentYear);
        }

        //getting the plans creation form
        $form   = $this->createCreateForm(new PlanAnualServicio(), $parentEntity);

        //getting subordinated services
        $services = $em->getRepository('sisconeeAppBundle:Servicio')->servicesWithoutPlan($parentEntity);

        return $this->render('sisconeeAppBundle:PlanAnualServicio:index.html.twig', array(
                'parentEntity' => $parentEntity,
                'entities' => $parentEntities,
                'fixedEntity'=>$fixedEntity,
                'generalPlan' => $plan,
                'remaining'=> $remaining,
                'annualPlans' => $annualPlans,
                'url' => 'plananualservicio',
                'showAddButton'=>sizeof($services)!=0,
                'form'=>$form->createView(),
            ));
    }

    /**
     * Return a json response with subordinated services to a parent, the annual plans of those services and the plan (reference and remaining) for the parent.
     * @param Request $request with the parent entity id
     * @return Response that represents a json object with related data
     */
    public function loadRelatedDataAction(Request $request)
    {
        //getting parent entity
        $entityId=$request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($entityId);


        //getting current configuration
        $currentConfiguration = $this->getCurrentConfiguration();
        if ($currentConfiguration == null) {
            var_dump('NO CONFIG');
            return; //No existe config para el actual org...link para crear nva config
        }
        $currentYear = $currentConfiguration->getPeriodoTrabajo();

        //getting related data
        $services = $em->getRepository('sisconeeAppBundle:Servicio')->servicesWithoutPlan($parentEntity);
        $annualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getAnnualPlansOfServicesBelongingTo($parentEntity, $currentYear);
        $plan = $this->getEntityReferencePlan($parentEntity, $currentYear);
        $remaining = $this->getEntityRemainingPlan($parentEntity, $currentYear);

        //creating json response
        $servicesData = [];
        foreach($services as $e)
            array_push($servicesData, array("entityName"=>(string)$e/*->getNombre()*/,  "id"=>$e->getId()));

        $plansData = [];
        foreach($annualPlans as $ap)
            array_push($plansData, array("entityName"=>(string)$ap->getServicio()/*->getNombre()*/,  "plan"=>$ap->getPlan(),
                'options' => $this->get('twig')->render("sisconeeAppBundle::edit-delete-plans.html.twig",
                    array('dir'=>'plananualservicio', 'apId'=>$ap->getId(), 'parentEntityId'=>$parentEntity->getId(), 'apDescription'=>$ap->getDescription()))));

        $response = array('subordinates'=>$servicesData, 'annualPlans'=>$plansData, 'plan'=>$plan, 'remaining'=>$remaining
        );

        $response = json_encode($response);

        return new Response($response, 200, array('Content-Type'=>'application/json'));
    }

    /**
     * Creates a new PlanAnualServicio entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $parentId = $request->request->get('sisconee_appbundle_plananualservicio')['parent'];
        $serviceId = $request->request->get('sisconee_appbundle_plananualservicio')['servicio'];
        $plan = $request->request->get('sisconee_appbundle_plananualservicio')['plan'];

        $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($parentId);
        $newService = $em->getRepository('sisconeeAppBundle:Servicio')->findOneById($serviceId)->getNombre();
        $currentYear = $this->getCurrentConfiguration()->getPeriodoTrabajo();

        $annualPlan = new PlanAnualServicio();
        $form = $this->createCreateForm($annualPlan,$parentEntity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            //verifying if new plan not exceeds remaining plan
            if ($annualPlan->getPlan() > $this->getEntityRemainingPlan($parentEntity, $currentYear)) {
                $success = false;
                $errorDescription = 'Plan excedido';
                $responseData = null;
            } else {
                $annualPlan->setAnno($currentYear);
                $em->persist($annualPlan);
                $em->flush();

                //Register Log (Plan, Servicio, Año)
                $current_user = $this->getCurrentUser();
                $data = $annualPlan->getPlan() . ',' . $annualPlan->getServicio() . ',' . $annualPlan->getAnno();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Añadir', 'plan_anual_servicio', $annualPlan->getId(), $data, $current_user);

                $success = true;
                $errorDescription = null;
                $responseData = array(
                    'entityName' => $newService,
                    'plan' => $plan,
                    'options' => $this->get('twig')->render(
                        'sisconeeAppBundle::edit-delete-plans.html.twig',
                        array('dir'=>'plananualservicio','apId' => $annualPlan->getId(), 'parentEntityId'=>$parentEntity->getId(), 'apDescription' => $annualPlan->getDescription())
                    )
                );
            }
        } else { //invalid form
            $success = false;
            $errorDescription = 'Formulario inválido';
            $responseData = null;
        }

        $response = array(
            'success' => $success,
            'errorDescription' => $errorDescription,
            'responseData' => $responseData
        );

        $response = json_encode($response);

        return new Response($response, 200, array('Content-Type'=>'application/json'));

    }

    /**
     * Creates a form to create a PlanAnualServicio entity.
     *
     * @param PlanAnualServicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PlanAnualServicio $entity, $parentEntity)
    {

        $form = $this->createForm(new PlanAnualServicioType($parentEntity, $this->getDoctrine()), $entity, array(
            'action' => $this->generateUrl('plananualservicio_create'),
            'method' => 'POST',
        ));


        //$form->add('submit', 'submit', array('label' => 'Agregar'));

        return $form;
    }

    /**
     * Displays a form to create a new PlanAnualServicio entity.
     *
     */
//    public function newAction()
//    {
//        $entity = new PlanAnualServicio();
//        $form   = $this->createCreateForm($entity);
//
//        return $this->render('sisconeeAppBundle:PlanAnualServicio:new.html.twig', array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
//    }

    /**
     * Finds and displays a PlanAnualServicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanAnualServicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAppBundle:PlanAnualServicio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PlanAnualServicio entity.
     *
     */
    public function editAction($id, $parentEntityId)
    {
        $em = $this->getDoctrine()->getManager();

        $annualPlanService = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->find($id);
       // $parentEntity=$annualPlanService->getServicio()->getEntidad();

        if (!$annualPlanService) {
            throw $this->createNotFoundException('Unable to find PlanAnualServicio entity.');
        }

        $editForm = $this->createEditForm($annualPlanService, $parentEntityId);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAppBundle:PlanAnualServicio:edit.html.twig', array(
            'entity'      => $annualPlanService->getServicio(),
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PlanAnualServicio entity.
    *
    * @param PlanAnualServicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PlanAnualServicio $entity, $parentEntityId)
    {
        $form = $this->createForm(new EditPlanAnualServicioType($parentEntityId), $entity, array(
            'action' => $this->generateUrl('plananualservicio_update', array('id' => $entity->getId(), 'parentEntityId'=>$parentEntityId)),
            'method' => 'PUT',
        ));
       // $form->add('submit', 'submit', array('label' => 'Update'));
        return $form;
    }




    /**
     * Edits an existing PlanAnualServicio entity.
     *
     */
    public function updateAction(Request $request, $id, $parentEntityId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanAnualServicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity, $parentEntityId);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //Register Log (Plan, Servicio, Año)
            $current_user = $this->getCurrentUser();
            $data = $entity->getPlan() . ',' . $entity->getServicio() . ',' . $entity->getAnno();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Actualizar', 'plan_anual_servicio', $id, $data, $current_user);

            return $this->redirect($this->generateUrl('plananualservicio', array('id' => $parentEntityId)));
        }

        return $this->render('sisconeeAppBundle:PlanAnualServicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PlanAnualServicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PlanAnualServicio entity.');
            }
//
//            $em->remove($entity);
//            $em->flush();
        $em->remove($entity);

        try {
            $em->flush();

            //Register Log (Plan, Servicio, Año)
            $current_user = $this->getCurrentUser();
            $data = $entity->getPlan() . ',' . $entity->getServicio() . ',' . $entity->getAnno();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Eliminar', 'plan_anual_servicio', $id, $data, $current_user);

        } catch (\Exception $e) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'El servicio no pudo ser eliminado. Es posible que tenga registros relacionados.'
            );
        }
       // }

        return $this->redirect($this->generateUrl('plananualservicio'));
    }

    /**
     * Creates a form to delete a PlanAnualServicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plananualservicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
