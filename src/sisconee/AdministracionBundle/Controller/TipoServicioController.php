<?php

namespace sisconee\AdministracionBundle\Controller;

use Doctrine\DBAL\DBALException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use sisconee\AppBundle\Entity\TipoServicio;
use sisconee\AdministracionBundle\Form\TipoServicioType;

/**
 * TipoServicio controller.
 *
 */
class TipoServicioController extends BaseUserController
{

    /**
     * Lists all TipoServicio entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('prefixedsessionservice')->setPrefix('administracion_tiposervicio');

        //Order..
        $success = $this->get('orderbyservice')->resolveOrderBy($request->query->get('column'), array('descripcion'), $request->query->get('order'));
        $column = $this->get('orderbyservice')->getColumn();
        $order =  $this->get('orderbyservice')->getOrder();

        //Filter...
        $success = $success && $this->get('filterservice')->Filter($request->request->get('filter'));
        $filter = $this->get('filterservice')->getFilterText();

        //getting total count of elements in the view
         $totalCount =  $em->getRepository("sisconeeAppBundle:TipoServicio")->countForAdminList($filter);

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
        $entities = $em->getRepository("sisconeeAppBundle:TipoServicio")->findAllForAdminList(
                $column,$order, $filter, $firstResultIndex, $recordsPerPage);

        return $this->render("sisconeeAdministracionBundle:TipoServicio:index.html.twig", array(
            'entities' => $entities,
            'count' => $totalCount,
            'column' => $column,
            'order' => $order,
            'filter' => $filter,
            'page' => $currentPage,
            'page_count' => $countOfPages
        ));
        /*$em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $session = $this->get('session');

        //Order by...
        //$column = $request->query->get('column');
        $column = 'descripcion';
        $order = null;

        if (is_null($column)) {
            $column = $session->get('column');
            $order = $session->get('order');

            if (is_null($column)) { //Valores por defecto...
                $column = 'descripcion';
                $order = "ASC";
            }
        } else {
            if ($column != $session->get('column')) {
                $order = "ASC";
            } else {
                $order = $session->get('order');
                if (is_null($order) || $order == "DESC") {
                    $order = "ASC";
                } else {
                    $order = "DESC";
                }
            }
        }

        $session->set('column', $column);
        $session->set('order', $order);

        //Filter...
        $filter = $request->request->get('filter');
        if (is_null($filter)) {
            $filter = $session->get('filter');
        }

        $session->set('filter', $filter);

        //Paging...
        $records_per_page = 10;
        $page = $request->query->get('page');

        if (is_null($page)) {
            $page = $session->get('page');
            if (is_null($page)) {
                $page = 1;
            } //Valor por defecto...
        }

        $count = $em->getRepository("sisconeeAppBundle:TipoServicio")->countForAdminList($filter);
        //$count =  10;
        $page_count = ceil($count / $records_per_page);
        $first_record = ($page - 1) * $records_per_page;

        $session->set('page', $page);

        //List...
        $entities = $em->getRepository("sisconeeAppBundle:TipoServicio")->findAllForAdminList(
            $column,
            $order,
            $filter,
            $first_record,
            $records_per_page
        );


        return $this->render(
            "sisconeeAdministracionBundle:TipoServicio:index.html.twig",
            array(
                'entities' => $entities,
                'count' => $count,
                'column' => $column,
                'order' => $order,
                'filter' => $filter,
                'page' => $page,
                'page_count' => $page_count,
            )
        );*/
    }

    /**
     * Creates a new TipoServicio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoServicio();
        $entity->setActivo(1);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            try {
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Los cambios fueron actualizados.'
                );
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'El tipo de servicio no pudo ser insertado. Ya existe un registro con ese nombre.'
                );
            }


            return $this->redirect($this->generateUrl('administracion_tiposervicio', array('id' => $entity->getId())));
        }

        return $this->render(
            'sisconeeAdministracionBundle:TipoServicio:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a TipoServicio entity.
     *
     * @param TipoServicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoServicio $entity)
    {
        $form = $this->createForm(
            new TipoServicioType(),
            $entity,
            array(
                'action' => $this->generateUrl('administracion_tiposervicio_create'),
                'method' => 'POST',
            )
        );

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoServicio entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoServicio();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'sisconeeAdministracionBundle:TipoServicio:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a TipoServicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:TipoServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoServicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAdministracionBundle:TipoServicio:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing TipoServicio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:TipoServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoServicio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAdministracionBundle:TipoServicio:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a TipoServicio entity.
     *
     * @param TipoServicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(TipoServicio $entity)
    {
        $form = $this->createForm(
            new TipoServicioType(),
            $entity,
            array(
                'action' => $this->generateUrl('administracion_tiposervicio_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing TipoServicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:TipoServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoServicio entity.');
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

            return $this->redirect($this->generateUrl('administracion_tiposervicio', array('id' => $id)));
        }

        return $this->render(
            'sisconeeAdministracionBundle:TipoServicio:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a TipoServicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sisconeeAppBundle:TipoServicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No fue posible encontrar ese Tipo de servicio');
        }

        try {

            $em->remove($entity);
            $em->flush();

        } catch (DBALException $e) {

            if ($e->getPrevious()->getCode() == 23000
            ) { //Error de integridad referencial, tiene servicios asociados

                //obteniendo los servicios asociados
                //$listado_servicios = $entity->getServicios();
                $listado_servicios = $em->getRepository('sisconeeAppBundle:Servicio')->findServicios($id);
                //print_r($listado_servicios);

                //crear una cadena con los servicios separados por coma
                $texto = '';
                foreach ($listado_servicios as $servicio) {
                    $texto .= $servicio->getNombre() . ' de la entidad: ' . $servicio->getEntidad()->getNombre(
                        ) . ', ';

                }

            }

            $this->get('session')->getFlashBag()->add(
                'error',
                'El tipo de servicio no pudo ser eliminado. Debe eliminar la asociación con los servicios siguientes: ' .
                $texto

            );
        } catch (\Exception $e) {

            $this->get('session')->getFlashBag()->add(
                'error',
                $e->getMessage()

            );

        }

        //}

        $this->get('session')->getFlashBag()->add(
            'notice',
            'el Tipo de servicio se eliminó satisfactoriamente'

        );

        return $this->redirect($this->generateUrl('administracion_tiposervicio'));
    }

    /**
     * Creates a form to delete a TipoServicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administracion_tiposervicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
