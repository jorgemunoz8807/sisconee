<?php

namespace sisconee\AdministracionBundle\Controller;

use sisconee\AdministracionBundle\Form\ChangePassType;
use sisconee\AppBundle\Entity\ChangePass;
use sisconee\AppBundle\Entity\ChangePassword;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Security\Core\Util\StringUtils;

use sisconee\AppBundle\Entity\Usuario;


use sisconee\AdministracionBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\SecurityContext;


/**
 * Usuario controller.
 *
 */
class UsuarioController extends BaseUserController
{

    //private $securityContext;
    // public function __construct(SecurityContext $securityContext) { $this->securityContext = $securityContext;}
    /**
     * Lists all Usuario entities.
     *
     */

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('prefixedsessionservice')->setPrefix('administracion_usuario');

        //Order..
        $success = $this->get('orderbyservice')->resolveOrderBy(
            $request->query->get('column'),
            array('nombre', 'username', 'correo', 'rol'),
            $request->query->get('order')
        );
        $column = $this->get('orderbyservice')->getColumn();
        $order = $this->get('orderbyservice')->getOrder();

        //Filter...
        $success = $success && $this->get('filterservice')->Filter($request->request->get('filter'));
        $filter = $this->get('filterservice')->getFilterText();

        //getting total count of elements in the view that depends of the logged user
        if ($this->isLogged_PlanificadorSuperior()) {
            $totalCount = $em->getRepository("sisconeeAppBundle:Usuario")->countOfUserBelongToOrganism(
                $this->getOrganismOfCurrentUser(),
                $filter
            );
        } else //is logged PlanificadorEntidad
        {
            $totalCount = $em->getRepository("sisconeeAppBundle:Usuario")->countOfUserBelongToEntity(
                $this->getEntityOfCurrentUser(),
                $filter
            );
        }

        //Paging...
        $success = $success && $this->get('pagerservice')->Paging($request->query->get('page'), $totalCount);
        $currentPage = $this->get('pagerservice')->getPage();
        $countOfPages = $this->get('pagerservice')->getPageCount();
        $firstResultIndex = $this->get('pagerservice')->getFirstResult();
        $recordsPerPage = $this->get('pagerservice')->getMaxResult();

        if (!$success) {
            throw $this->createNotFoundException(
                "Algunos de los parámetros proporcionados son incorrectos o están fuera de rango."
            );
        }

        //List...
        $users = null;
        if ($this->isLogged_PlanificadorSuperior()) {
            $users = $em->getRepository("sisconeeAppBundle:Usuario")->findAllBelongToOrganism
            (
                $this->getOrganismOfCurrentUser(),
                $column,
                $order,
                $filter,
                $firstResultIndex,
                $recordsPerPage
            );
        } else {  //is logged PlanificadorEntidad
            $users = $em->getRepository("sisconeeAppBundle:Usuario")->findAllBelongToEntity(
                $this->getEntityOfCurrentUser(),
                $column,
                $order,
                $filter,
                $firstResultIndex,
                $recordsPerPage
            );
        }

        return $this->render(
            "sisconeeAdministracionBundle:Usuario:index.html.twig",
            array(
                'entities' => $users,
                'count' => $totalCount,
                'column' => $column,
                'order' => $order,
                'filter' => $filter,
                'page' => $currentPage,
                'page_count' => $countOfPages
            )
        );

    }

    /**
     * Creates a new TipoServicio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Usuario();
        $generator = new SecureRandom();

        // $form = $this->createCreateForm($humanReadableString);
        $form = $this->createCreateForm($entity);

        //var_dump($entity);
        $form->handleRequest($request);

        $humanReadableString = bin2hex($generator->nextBytes(7));

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($entity);
        $password = $encoder->encodePassword($humanReadableString, $entity->getSalt());
        $entity->setPassword($password);
        $entity->setNombre($entity->getNombre());

//                var_dump($password);die;

//        $entity->setPassword($humanReadableString);
        $entity->setActivo(1);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            //var_dump($entity);

            try {

//              llamaral metodo enviar email en la controladora email y ponerleel usuario y la contrase�a generada
//              aleatoriamente para que el usuario la reciba

                $name = $entity->getNombre();
                $password = $entity->getPassword();

                $email = $entity->getCorreo();

                $this->forward(
                    'sisconeeAppBundle:Email:SendEmail',
                    array('name' => $name, 'password' => $humanReadableString, 'email' => $email)
                );

                $em->flush();

                //Register Log ()
                $data = $entity->getCorreo() . ',' . $entity->getNombre() . ',' . $entity->getRol() . ',' . $entity->getUsername() . ',' . $entity->getEntidad();
                $em->getRepository('sisconeeAppBundle:Trazas')->persistLog(
                    'Añadido',
                    'user',
                    $entity->getId(),
                    $data,
                    $this->getCurrentUser()
                );

                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Los cambios fueron actualizados.'
                );
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'El usuario no pudo ser insertado. Ya existe un registro con ese nombre.'
                );
            }

            return $this->redirect($this->generateUrl('administracion_usuario', array('id' => $entity->getId())));
        }

        return $this->render(
            'sisconeeAdministracionBundle:Usuario:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usuario $entity)
    {
        $form = $this->createForm(
            new UsuarioType($securityContext = $this->container->get('security.context')),
            $entity,
            array(
                'action' => $this->generateUrl('administracion_usuario_create'),
                'method' => 'POST',
            )
        );

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'sisconeeAdministracionBundle:Usuario:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Usuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAdministracionBundle:Usuario:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity, 'adminEdit');
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAdministracionBundle:Usuario:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView()

            )
        );
    }

    public function editCommonUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity, 'commonUserEdit');
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'sisconeeAdministracionBundle:Usuario:commonUserEdit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView()

            )
        );
    }


    /**
     * Creates a form to edit a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Usuario $entity, $fromPage)
    {
        $form = $this->createForm(
            new UsuarioType($securityContext = $this->container->get('security.context')),
            $entity,
            array(
                'action' => $this->generateUrl('usuario_update', array('id' => $entity->getId(), 'fromPage' => $fromPage)),
                'method' => 'PUT',
            )
        );

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }


    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id, $fromPage)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Usuario')->find($id);
        $userPass = $entity->getPassword();
        $userEntity = $entity->getEntidad();
        $userRol = $entity->getRol();
        $userState = $entity->getActivo();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity, $fromPage);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            // if($userPass!=$entity->getPassword())
            $entity->setPassword($userPass);

            if ($entity->getEntidad() == null)
                $entity->setEntidad($userEntity);

            if ($entity->getRol() == null)
                $entity->setRol($userRol);

            // if($userState!=$entity->getActivo())
            $entity->setActivo($userState);


            $em->flush();

            //Register Log ()
            $data = $entity->getCorreo() . ',' . $entity->getNombre() . ',' . $entity->getRol() . ',' . $entity->getUsername() . ',' . $entity->getEntidad();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog(
                'Actualizado',
                'user',
                $entity->getId(),
                $data,
                $this->getCurrentUser()
            );

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Los cambios fueron actualizados.'
            );

            if ($fromPage == 'adminEdit')
                return $this->redirect($this->generateUrl('administracion_usuario', array('id' => $id)));
            else //commonUserEdit
                return $this->redirect($this->generateUrl('usuario_edit', array('id' => $id)));

        } else {
            var_dump('no valid');

            $this->get('session')->getFlashBag()->add(
                'error',
                $editForm->getErrors()->__toString()
            );
        }

        if ($fromPage == 'adminEdit')
            return $this->render(
                'sisconeeAdministracionBundle:Usuario:edit.html.twig',
                array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                )
            );
        else //commonUserEdit
            return $this->redirect($this->generateUrl('usuario_edit', array('id' => $id)));
    }


    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sisconeeAppBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $em->remove($entity);

        //Register Log ()

        try {
            $em->flush();

            //Register Log ()
            $data = $entity->getCorreo() . ',' . $entity->getNombre() . ',' . $entity->getRol() . ',' . $entity->getUsername() . ',' . $entity->getEntidad();
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog(
                'Eliminado',
                'user',
                $id,
                $data,
                $this->getCurrentUser()
            );

        } catch (\Exception $e) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'El usuario no pudo ser eliminado. Es posible que tenga registros relacionados.'
            );
        }

        //}

        return $this->redirect($this->generateUrl('administracion_usuario'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administracion_usuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    public function editPasswordAction(Request $request, $id)
    {
        $entity = $this->getCurrentUser();
        $changePass = new ChangePass();

        $form = $this->createForm(new ChangePassType(), $changePass);
        $form->handleRequest($request);

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($entity);
        $oldPass = $encoder->encodePassword($changePass->getOldPass(), $entity->getSalt());


        if ($form->isValid() && $oldPass == $entity->getPassword()) {

            $em = $this->getDoctrine()->getManager();

            $newPass = $encoder->encodePassword($changePass->getNewPass(), $entity->getSalt());
            $entity->setPassword($newPass);
            try {
                $em->persist($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'La contraseña fue actualizada correctamente.'
                );
            } catch (Exception $e) {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'Ha ocurrido un error. Su contraseña no pudo actualizarse.'
                );
            }

        }

//        if($this->isLogged_PlanificadorSuperior() || $this->isLogged_PlanificadorEntidad())
        return $this->render(
            'sisconeeAdministracionBundle:Usuario:commonUserEditPass.html.twig',
            array(
                'edit_form' => $form->createView(),
                'entity' => $entity,
            )
        );

    }

}
