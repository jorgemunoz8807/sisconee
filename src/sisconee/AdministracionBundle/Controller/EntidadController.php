<?php

namespace sisconee\AdministracionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sisconee\AppBundle\Entity\Entidad;
use sisconee\AdministracionBundle\Form\EntidadType;

/**
 * Entidad controller.
 *
 */
class EntidadController extends BaseUserController
{
    /**
     * Lists all Entidad entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('prefixedsessionservice')->setPrefix('administracion_entidad');

        //Order..
        $success = $this->get('orderbyservice')->resolveOrderBy($request->query->get('column'), array('codReeup', 'siglas', 'nombre', 'entidadPadre'), $request->query->get('order'));
        $column = $this->get('orderbyservice')->getColumn();
        $order =  $this->get('orderbyservice')->getOrder();

        //Filter...
        $success = $success && $this->get('filterservice')->Filter($request->request->get('filter'));
        $filter = $this->get('filterservice')->getFilterText();

        //getting total count of elements in the view that depends of the logged user
        if($this->isLogged_PlanificadorSuperior()){
            $totalCount =  $em->getRepository("sisconeeAppBundle:Entidad")->countOfEntitiesBelongingTo($this->getOrganismOfCurrentUser(), $filter);
        }
        else //is logged PlanificadorEntidad
            $totalCount =  $em->getRepository("sisconeeAppBundle:Entidad")->countOfEntitiesSubordinatedTo($this->getEntityOfCurrentUser(), $filter);

        //Paging...
        $success = $success && $this->get('pagerservice')->Paging($request->query->get('page'), $totalCount);
        $currentPage = $this->get('pagerservice')->getPage();
        $countOfPages = $this->get('pagerservice')->getPageCount();
        $firstResultIndex = $this->get('pagerservice')->getFirstResult();
        $recordsPerPage = $this->get('pagerservice')->getMaxResult();

        if (!$success) {
            throw $this->createNotFoundException("Algunos de los parámetros proporcionados son incorrectos o están fuera de rango.");
        }

        //List...
        $entities = null;
        if($this->isLogged_PlanificadorSuperior()){
            $entities = $em->getRepository("sisconeeAppBundle:Entidad")->findAllForAdminListBelongingTo
            ($this->getOrganismOfCurrentUser(), $column, $order, $filter, $firstResultIndex, $recordsPerPage);
        }
        else {  //is logged PlanificadorEntidad
                $entities = $em->getRepository("sisconeeAppBundle:Entidad")->findAllForAdminListSubordinatedTo(
                $this->getEntityOfCurrentUser(), $column,$order, $filter, $firstResultIndex, $recordsPerPage);
        }

        return $this->render("sisconeeAdministracionBundle:Entidad:index.html.twig", array(
                'entities' => $entities,
                'count' => $totalCount,
                'column' => $column,
                'order' => $order,
                'filter' => $filter,
                'page' => $currentPage,
                'page_count' => $countOfPages
            ));
    }
    /**
     * Creates a new Entidad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Entidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            try {
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Los cambios fueron actualizados.');
            }

            catch(\Exception $e) {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'La entidad no pudo ser creada.'
                );
            }

            return $this->redirect($this->generateUrl('administracion_entidad', array('id' => $entity->getId())));
        }

        return $this->render('sisconeeAdministracionBundle:Entidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Entidad entity.
     *
     * @param Entidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Entidad $entity)
    {
        $securityContext = $this->container->get('security.context');

        $form = $this->createForm(new EntidadType($securityContext), $entity, array(
            'action' => $this->generateUrl('administracion_entidad_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Entidad entity.
     *
     */
    public function newAction()
    {
        $entity = new Entidad();
        $form   = $this->createCreateForm($entity);

        return $this->render('sisconeeAdministracionBundle:Entidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Entidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Entidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAdministracionBundle:Entidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Entidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Entidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entidad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAdministracionBundle:Entidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Entidad entity.
    *
    * @param Entidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Entidad $entity)
    {
        $securityContext = $this->container->get('security.context');
        $form = $this->createForm(new EntidadType($securityContext), $entity, array(
            'action' => $this->generateUrl('administracion_entidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Entidad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Entidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Los cambios fueron actualizados.'
            );

            return $this->redirect($this->generateUrl('administracion_entidad_edit', array('id' => $id)));
        }

        return $this->render('sisconeeAdministracionBundle:Entidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Entidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sisconeeAppBundle:Entidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Entidad entity.');
            }

            $em->remove($entity);
            try {
            $em->flush();
        }
        catch(\Exception $e) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'La entidad no pudo ser eliminada. Es posible que tenga registros relacionados.'
            );
        }
        //}

        return $this->redirect($this->generateUrl('administracion_entidad'));
    }

    /**
     * Creates a form to delete a Entidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administracion_entidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
