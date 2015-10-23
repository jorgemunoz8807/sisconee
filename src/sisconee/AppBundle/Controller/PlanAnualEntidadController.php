<?php

namespace sisconee\AppBundle\Controller;

use sisconee\AdministracionBundle\Controller\BaseUserController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use sisconee\AppBundle\Entity\PlanAnualEntidad;
use sisconee\AppBundle\Form\PlanAnualEntidadType;
use sisconee\AppBundle\Form\EditPlanAnualEntidadType;
use Symfony\Component\HttpFoundation\Response;
use sisconee\AppBundle\Entity\Entidad;


/*Cambio en la planificacion*/

/**
 * PlanAnualEntidad controller.
 *
 */
class PlanAnualEntidadController extends PlanificacionController
{

    /**
     * Provides a view that allows to distribute annual plans to subordinate entities...
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
        if ($this->isLogged_PlanificadorSuperior()) {
            $entities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllParentEntitiesBelongingTo($currentOrganismId);
            if(sizeOf($entities)<=0)
            {
                $parentEntity = $this->getEntityOfCurrentUser();
                $fixedEntity = false;
                $this->get('session')->getFlashBag()->add('warning', 'No existen entidades con entidades subordinadas que puedan asignar planes.');
            }

            else {
                $parentEntities = $this->setInFirstPlaceBaseEntity($entities);
                if (!is_null($id))
                    $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($id);
                else
                    $parentEntity = $parentEntities[0];
                $fixedEntity = false;
            }
        }
        else // Planificador de la entidad
        {
            $parentEntity = $this->getEntityOfCurrentUser();
            $fixedEntity = true;
        }

        //getting subordinates
        $subordinates = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedTo(
            $parentEntity
        );

        $subentities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedToWithoutPlan($parentEntity);

        if (sizeOf($subordinates) <= 0)
            $this->get('session')->getFlashBag()->add('warning', 'La entidad '.$parentEntity.' no tiene entidades subordinadas para asignarles plan.');

        //getting the reference plan and annual plans
        $plan = $this->getEntityReferencePlan($parentEntity, $currentYear);
        if (is_null($plan)) {
            $this->get('session')->getFlashBag()->add('warning', 'La entidad '.$parentEntity.' no tiene plan asignado aún.');
            $remaining = null;
            $annualPlans = [];
        } else {
            $annualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->getAnnualPlansOfSubEntitiesInAYear(
                $parentEntity,
                $currentYear
            );

            $remaining = $this->getEntityRemainingPlan($parentEntity, $currentYear);
        }

        //getting the plans creation form
        $form = $this->createCreateForm(new PlanAnualEntidad(), $parentEntity);

        return $this->render(
            'sisconeeAppBundle:PlanAnualEntidad:index.html.twig',
            array(
                'parentEntity' => $parentEntity,
                'entities' => $parentEntities,
                'fixedEntity' => $fixedEntity,
                'generalPlan' => $plan,
                'remaining' => $remaining,
                'annualPlans' => $annualPlans,
                'url' => 'plananualentidad',
                'showAddButton'=>sizeOf($subentities)!=0,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Return a json response with subordinated entities to a parent, the annual plans of those subentities and the plan (reference and remaining) for the parent.
     * @param Request $request with the parent entity id
     * @return Response that represents a json object with related data
     */
    public function loadRelatedDataAction(Request $request)
    {
        //getting parent entity
        $entityId = $request->query->get('id');
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
        $subentities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedToWithoutPlan($parentEntity);
        $annualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->getAnnualPlansOfSubEntitiesInAYear(
            $parentEntity,
            $currentYear
        );
        $plan = $this->getEntityReferencePlan($parentEntity, $currentYear);
        $remaining = $this->getEntityRemainingPlan($parentEntity, $currentYear);

        //creating json response
        $subentitiesData = [];
        foreach ($subentities as $e) {
            array_push($subentitiesData, array("entityName" => (string)$e/*->getSiglas()*/, "id" => $e->getId()));
        }

        $annualPlansData = [];
        foreach ($annualPlans as $ap) {
            array_push(
                $annualPlansData,
                array(
                    "entityName" => (string)$ap->getEntidad()/*->getSiglas()*/,
                    "plan" => $ap->getPlan(),
                    'options' => $this->get('twig')->render(
                        'sisconeeAppBundle::edit-delete-plans.html.twig',
                        array('dir'=>'plananualentidad','apId' => $ap->getId(), 'parentEntityId'=>$parentEntity->getId(), 'apDescription' => $ap->getDescription())
                    )
                )
            );
        }

        $response = array(
            'subordinates' => $subentitiesData,
            'annualPlans' => $annualPlansData,
            'plan' => $plan,
            'remaining' => $remaining
        );
        $response = json_encode($response);

        return new Response($response, 200, array('Content-Type' => 'application/json'));
    }


    /**
     * Creates a new PlanAnualEntidad entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $parentId = $request->request->get('sisconee_appbundle_plananualentidad')['parent'];
        $entityId = $request->request->get('sisconee_appbundle_plananualentidad')['entidad'];
        $plan = $request->request->get('sisconee_appbundle_plananualentidad')['plan'];

        $parentEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($parentId);
        $newEntity = $em->getRepository('sisconeeAppBundle:Entidad')->findOneById($entityId)->getSiglas();
        $currentYear = $this->getCurrentConfiguration()->getPeriodoTrabajo();

        $annualPlan = new PlanAnualEntidad();
        $form = $this->createCreateForm($annualPlan, $parentEntity);

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

                //Register Log (Plan, Entidad Subordinada, Año)
                $current_user = $this->getCurrentUser();
                $data = $annualPlan->getPlan() . ',' . $annualPlan->getEntidad() . ',' . $annualPlan->getAnno();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Añadir', 'plan_anual_entidad', $annualPlan->getId(), $data, $current_user);

                $success = true;
                $errorDescription = null;
                $responseData = array(
                    'entityName' => $newEntity,
                    'plan' => $plan,
                    'options' => $this->get('twig')->render(
                        'sisconeeAppBundle::edit-delete-plans.html.twig',
                        array('dir'=>'plananualentidad','apId' => $annualPlan->getId(), 'parentEntityId'=>$parentEntity->getId(),  'apDescription' => $annualPlan->getDescription())
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

        return new Response($response, 200, array('Content-Type' => 'application/json'));
    }

    /**
     * Creates a form to create a PlanAnualEntidad entity.
     *
     * @param PlanAnualEntidad $entity The entity
     * @param PlanAnualEntidad $entities listado de entidades a mostrar en el campo de seleccion  Entidad
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PlanAnualEntidad $entity, $parentEntity)
    {
        $form = $this->createForm(
            new PlanAnualEntidadType($parentEntity, $this->getDoctrine()),
            $entity,
            array(
                'action' => $this->generateUrl('plananualentidad_create'),
                'method' => 'POST',
            )
        );

        // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to edit an existing PlanAnualEntidad entity.
     *
     */
    public function editAction($id, $parentEntityId)
    {
        $em = $this->getDoctrine()->getManager();
        $annualPlan = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->findOneById($id);

        if (!$annualPlan) {
            throw $this->createNotFoundException('Unable to find PlanAnualEntidad entity.');
        }

        $editForm = $this->createEditForm($annualPlan, $parentEntityId);


        return $this->render(
            'sisconeeAppBundle:PlanAnualEntidad:edit.html.twig',
            array(
                'entity' => $annualPlan->getEntidad(),
                'edit_form' => $editForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a PlanAnualEntidad entity.
     *
     * @param PlanAnualEntidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PlanAnualEntidad $entity , $parentEntityId)
    {
        $form = $this->createForm(
            new EditPlanAnualEntidadType($parentEntityId),
            $entity,
            array(
                'action' => $this->generateUrl('plananualentidad_update', array('id' => $entity->getId(), 'parentEntityId'=>$parentEntityId)),
                'method' => 'PUT',
            )
        );

        // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PlanAnualEntidad entity.
     *
     */
    public function updateAction(Request $request, $id, $parentEntityId)
    {
        $em = $this->getDoctrine()->getManager();

        $annualPlan = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->findOneById($id);

        if (!$annualPlan) {
            throw $this->createNotFoundException('Unable to find PlanAnualEntidad entity.');
        }

        $editForm = $this->createEditForm($annualPlan,$parentEntityId );
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //Register Log (Plan, Entidad Subordinada, Año)
            $current_user = $this->getCurrentUser();
            $data = $annualPlan->getPlan() . ',' . $annualPlan->getEntidad() . ',' . $annualPlan->getAnno();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Actualizar', 'plan_anual_entidad', $annualPlan->getId(), $data, $current_user);

            return $this->redirect($this->generateUrl('plananualentidad'/*, array('id' => $id)*/));
        }

        return $this->render(
            'sisconeeAppBundle:PlanAnualEntidad:edit.html.twig',
            array(
                'entity' => $annualPlan->getEntidad(),
                'edit_form' => $editForm->createView(),
            )
        );
    }

    /**
     * Finds and displays a PlanAnualEntidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanAnualEntidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAppBundle:PlanAnualEntidad:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a PlanAnualEntidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        // $form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanAnualEntidad entity.');
        }

        $em->remove($entity);
        try {
            $em->flush();
            //Register Log (Plan, Entidad Subordinada, Año)
            $current_user = $this->getCurrentUser();
            $data = $entity->getPlan() . ',' . $entity->getEntidad() . ',' . $entity->getAnno();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog('Eliminar', 'plan_anual_entidad', $id, $data, $current_user);

        } catch (\Exception $e) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'La entidad no pudo ser eliminada. Es posible que tenga registros relacionados.'
            );
        }

        //}

        return $this->redirect($this->generateUrl('plananualentidad'));
    }

    /**
     * Creates a form to delete a PlanAnualEntidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plananualentidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

}
