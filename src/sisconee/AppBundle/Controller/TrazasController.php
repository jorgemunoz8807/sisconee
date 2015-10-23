<?php

namespace sisconee\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use sisconee\AppBundle\Entity\Trazas;
use sisconee\AppBundle\Form\TrazasType;

/**
 * Trazas controller.
 *
 */
class TrazasController extends Controller
{

    /**
     * Lists all Trazas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('sisconeeAppBundle:Trazas')->findAll();


        return $this->render('sisconeeAppBundle:Trazas:index.html.twig', array(
            'entities' => $entities,

        ));
    }

    /**
     * Creates a new Trazas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Trazas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trazas_show', array('id' => $entity->getId())));
        }

        return $this->render('sisconeeAppBundle:Trazas:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Trazas entity.
     *
     * @param Trazas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Trazas $entity)
    {
        $form = $this->createForm(new TrazasType(), $entity, array(
            'action' => $this->generateUrl('trazas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trazas entity.
     *
     */
    public function newAction()
    {
        $entity = new Trazas();
        $form = $this->createCreateForm($entity);

        return $this->render('sisconeeAppBundle:Trazas:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Trazas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Trazas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAppBundle:Trazas:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Trazas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Trazas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAppBundle:Trazas:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Trazas entity.
     *
     * @param Trazas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Trazas $entity)
    {
        $form = $this->createForm(new TrazasType(), $entity, array(
            'action' => $this->generateUrl('trazas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Trazas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Trazas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trazas_edit', array('id' => $id)));
        }

        return $this->render('sisconeeAppBundle:Trazas:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Trazas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sisconeeAppBundle:Trazas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trazas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trazas'));
    }

    /**
     * Creates a form to delete a Trazas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trazas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
