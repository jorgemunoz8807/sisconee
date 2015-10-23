<?php

namespace sisconee\AdministracionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use sisconee\AppBundle\Entity\Servicio;
use sisconee\AdministracionBundle\Form\ServicioType;

/**
 * Servicio controller.
 *
 */
class ServicioController extends BaseUserController
{

    /**
     * Lists all Servicio entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('prefixedsessionservice')->setPrefix('administracion_servicio');

        //Order..
        $success = $this->get('orderbyservice')->resolveOrderBy($request->query->get('column'), array('nombre', 'codClienteEE', 'codRutaFolio', 'entidad', 'tipoServicio', 'horarioPico'), $request->query->get('order'));
        $column = $this->get('orderbyservice')->getColumn();
        $order =  $this->get('orderbyservice')->getOrder();

        //Filter...
        $success = $success && $this->get('filterservice')->Filter($request->request->get('filter'));
        $filter = $this->get('filterservice')->getFilterText();

        //getting total count of elements in the view that depends of the logged user
        if($this->isLogged_PlanificadorSuperior()){
            $totalCount =  $em->getRepository("sisconeeAppBundle:Servicio")->countForAdminListBelongToOrg($this->getOrganismOfCurrentUser(), $filter);
        }
        else //is logged PlanificadorEntidad
            $totalCount =  $em->getRepository("sisconeeAppBundle:Servicio")->countForAdminListBelongTo($this->getEntityOfCurrentUser(), $filter);

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
            $entities = $em->getRepository("sisconeeAppBundle:Servicio")->findAllBelongToOrg
            ($this->getOrganismOfCurrentUser(), $column, $order, $filter, $firstResultIndex, $recordsPerPage);
        }
        else {  //is logged PlanificadorEntidad
            $entities = $em->getRepository("sisconeeAppBundle:Servicio")->findAllBelongTo(
                $this->getEntityOfCurrentUser(), $column,$order, $filter, $firstResultIndex, $recordsPerPage);
        }

        return $this->render("sisconeeAdministracionBundle:Servicio:index.html.twig", array(
            'entities' => $entities,
            'count' => $totalCount,
            'column' => $column,
            'order' => $order,
            'filter' => $filter,
            'page' => $currentPage,
            'page_count' => $countOfPages
        ));
    }

        /*$em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $session = $this->get('session');

        //Order by...
       //$column = $request->query->get('column');
        $column = 'nombre';
        $order = null;

        if (is_null($column)) {
            $column = $session->get('column');
            $order = $session->get('order');

            if (is_null($column)) { //Valores por defecto...
                $column = 'nombre';
                $order = "ASC";
            }
        }
        else {
            if ($column != $session->get('column')) {
                $order = "ASC";
            }
            else {
                $order = $session->get('order');
                if (is_null($order) || $order == "DESC" ) $order = "ASC";
                else $order = "DESC";
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
            if (is_null($page)) $page = 1; //Valor por defecto...
        }

        //$count =  $em->getRepository("sisconeeAppBundle:Servicio")->countForAdminList($filter);
        //$count =  10;
        //$page_count = ceil($count/$records_per_page);
        $first_record = ($page-1) * $records_per_page;

        $session->set('page', $page);

        //List...
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('ROLE_PLANIFICADOR_SUP')) {
            $organismo = $securityContext->getToken()->getUser()->getEntidad()->getOrganismo();
            $count =  $em->getRepository("sisconeeAppBundle:Servicio")->countForAdminListBelongToOrg($filter,$organismo);
            $entities = $em->getRepository("sisconeeAppBundle:Servicio")->findAllBelongToOrg(
                $column,
                $order,
                $filter,
                $first_record,
                $records_per_page,
                $organismo
            );
            /*$entities = $em->getRepository("sisconeeAppBundle:Servicio")->findAllForAdminList(
                $column,
                $order,
                $filter,
                $first_record,
                $records_per_page
            );*/
        /*}
        else {
                $entidad = $securityContext->getToken()->getUser()->getEntidad();
                $count =  $em->getRepository("sisconeeAppBundle:Servicio")->countForAdminListBelongTo($filter,$entidad);
                $entities = $em->getRepository("sisconeeAppBundle:Servicio")->findAllBelongTo($column, $order, $filter, $first_record, $records_per_page, $entidad);

            }

        $page_count = ceil($count/$records_per_page);

        return $this->render("sisconeeAdministracionBundle:Servicio:index.html.twig", array(
                'entities' => $entities,
                'count' => $count,
                'column' => $column,
                'order' => $order,
                'filter' => $filter,
                'page' => $page,
                'page_count' => $page_count,
            ));
    }*/
    /**
     * Creates a new Servicio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Servicio();

        $entity->setActivo(1);

        //Se carga una provincia por defecto
        $provincia = $this->getDoctrine()
            ->getRepository('sisconeeAppBundle:Provincia')
            ->find(2);
        //Se le establece la provincia por defecto al servicio (necesario para el funcionamiento de la programacion asociada
         //a los eventos PRE_SET_DATA y PRE_SUBMIT)
        $entity->setProvincia($provincia);

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
                    'El servicio no pudo ser insertado. Ya existe un registro con ese nombre.'
                );
            }

            return $this->redirect($this->generateUrl('administracion_servicio', array('id' => $entity->getId())));
        }

        return $this->render('sisconeeAdministracionBundle:Servicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Servicio entity.
     *
     * @param Servicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Servicio $entity)
    {
        $securityContext = $this->container->get('security.context');
        $form = $this->createForm(new ServicioType($securityContext), $entity, array(
            'action' => $this->generateUrl('administracion_servicio_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Servicio entity.
     *
     */
    public function newAction()
    {
        $entity = new Servicio();
        $entity->setActivo(1);

        //Se carga una provincia por defecto
        $provincia = $this->getDoctrine()
            ->getRepository('sisconeeAppBundle:Provincia')
            ->find(2);
        //Se le establece la provincia por defecto al servicio (necesario para el funcionamiento de la programacion asociada
        //a los eventos PRE_SET_DATA y PRE_SUBMIT)
        //var_dump($provincia);
        $entity->setProvincia($provincia);

        $form   = $this->createCreateForm($entity);

        return $this->render('sisconeeAdministracionBundle:Servicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Servicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAdministracionBundle:Servicio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Servicio entity.
     *
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('sisconeeAdministracionBundle:Servicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Servicio entity.
    *
    * @param Servicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Servicio $entity)
    {
        $securityContext = $this->container->get('security.context');
        $form = $this->createForm(new ServicioType($securityContext), $entity, array(
            'action' => $this->generateUrl('administracion_servicio_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Servicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Servicio')->find($id);

        //Se carga una provincia por defecto
        //$provincia = $entity->getProvincia();
        //Se le establece la provincia por defecto al servicio (necesario para el funcionamiento de la programacion asociada
        //a los eventos PRE_SET_DATA y PRE_SUBMIT)
        //$entity->setProvincia($provincia);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
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

            return $this->redirect($this->generateUrl('administracion_servicio', array('id' => $id)));
        }

        return $this->render('sisconeeAdministracionBundle:Servicio:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
    }
    /**
     * Deletes a Servicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sisconeeAppBundle:Servicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Servicio entity.');
            }

            $em->remove($entity);

            try {
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'El servicio fue eliminado satisfactoriamente.');
            }
            catch(\Exception $e) {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'El servicio no pudo ser eliminado. Es posible que tenga registros relacionados.'
                );
            }
        //}

        return $this->redirect($this->generateUrl('administracion_servicio'));
    }

    /**
     * Creates a form to delete a Servicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administracion_servicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


}
