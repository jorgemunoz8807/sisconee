<?php

namespace sisconee\AdministracionBundle\Controller;

use sisconee\AppBundle\Entity\PlanAnualEntidad;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use sisconee\AppBundle\Entity\Configuracion;
use sisconee\AdministracionBundle\Form\ConfiguracionType;
use Symfony\Component\HttpFoundation\Response;


/**
 * Configuracion controller.
 *
 */
class ConfiguracionController extends BaseUserController
{

    /**
     * Displays a form to create a new Configuracion entity.
     *
     */
    public function newAction()
    {
        //Getting current user data
        //$securityContext = $this->container->get('security.context');
       // $userOrganism = $securityContext->getToken()->getUser()->getEntidad()->getOrganismo();

        $entity = new Configuracion();
        //$entity->setOrganismo($this->getCurrentUserOrganism());
        $form   = $this->createCreateForm($entity);

        return $this->render('sisconeeAdministracionBundle:Configuracion:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }

    /**
     * Get configuration by year
     */
    public function getConfigurationAction(Request $request)
    {
        $year = $request->query->get('year');

        $em = $this->getDoctrine()->getManager();
        $configuration = $em->getRepository('sisconeeAppBundle:Configuracion')->getConfigurationByYear($this->getOrganismOfCurrentUser(),$year);

        $session = $this->get('prefixedsessionservice');

        $session->set('configuration_year',$year);

        /*$this->get('session')->getFlashBag()->add(
            'notice',
            'La configuración ha sido establecida para el año '. $year);*/

        $response = array(
            'year' => $configuration->getPeriodoTrabajo(),
            'plan' => $configuration->getPlan(),
            'cerrado' => $configuration->getCerrado()
        );
        $response = json_encode($response);
        return new Response($response, 200, array('Content-Type' => 'application/json'));
    }

    public function changeStatusAction (Request $request)
    {
        $year = $request->query->get('year');

        $em = $this->getDoctrine()->getManager();
        $configuration = $em->getRepository('sisconeeAppBundle:Configuracion')->getConfigurationByYear($this->getOrganismOfCurrentUser(),$year);

        $configuration->setCerrado (!$configuration->getCerrado());
        $em->flush();

        $response = array(
        );
        $response = json_encode($response);
        return new Response($response, 200, array('Content-Type' => 'application/json'));
    }


    /**
     * Creates a form to create a Configuracion entity.
     *
     * @param Configuracion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Configuracion $entity)
    {
        $form = $this->createForm(new ConfiguracionType($this->getOrganismOfCurrentUser(), $this->getDoctrine(), 1), $entity, array(
                'action' => $this->generateUrl('configuracion_create'),
                'method' => 'POST',
            ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a new Configuracion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Configuracion();
        $entity->setOrganismo($this->getOrganismOfCurrentUser());
        $entity->setCerrado(false);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            /*$baseEntity = $em->getRepository('sisconeeAppBundle:Entidad')->getBaseEntity(
                $this->getOrganismOfCurrentUser()->getId());*/

            try {
                $baseEntity = $em->getRepository('sisconeeAppBundle:Entidad')->getBaseEntity(
                    $this->getOrganismOfCurrentUser()->getId()
                );
            }
            catch(\Doctrine\ORM\NonUniqueResultException $e)
            {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'Existe más de una entidad base para el organismo '.$this->getOrganismOfCurrentUser()->getSiglas().'.'
                );
            }

            $annualPlanEntity = new PlanAnualEntidad();
            $annualPlanEntity->setEntidad($baseEntity);
            $annualPlanEntity->setAnno($entity->getPeriodoTrabajo());
            $annualPlanEntity->setPlan($entity->getPlan());

            $em->persist($annualPlanEntity);

            try {
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'La configuración ha sido creada satisfactoriamente.');
            }
            catch(Exception $e)
            {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'La configuración general no pudo ser creada.'
                );
            }

            return $this->redirect($this->generateUrl('configuracion_edit', array('id' => $entity->getId())));
        }

        return $this->render('sisconeeAdministracionBundle:Configuracion:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }




    /**
     * Displays a form to edit an existing Configuracion entity.
     *
     */
    public function editAction()
    {
        $currentConfig = $this->getCurrentConfiguration();
        if (!$currentConfig) {

            $this->get('session')->getFlashBag()->add(
                'error',
                'No existe ninguna configuraci�n para el organismo '.$this->getOrganismOfCurrentUser().'. Agregue una nueva...'
            );
           return $this->newAction();
        }

        $editForm = $this->createEditForm($currentConfig);

        return $this->render('sisconeeAdministracionBundle:Configuracion:edit.html.twig', array(
            'entity'      => $currentConfig,
            'edit_form'   => $editForm->createView(),
            'statusText'  => $currentConfig->getCerrado() ? "Abrir" : "Cerrar"
        ));
    }

    /**
    * Creates a form to edit a Configuracion entity.
    *
    * @param Configuracion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Configuracion $entity)
    {
        $form = $this->createForm(new ConfiguracionType($this->getOrganismOfCurrentUser(), $this->getDoctrine(), 0), $entity, array(
            'action' => $this->generateUrl('configuracion_update'),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

     /**
     * Edits an existing Configuracion entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $submitConfiguration = new Configuracion();

        $editForm = $this->createEditForm($submitConfiguration);
        $editForm->handleRequest($request);
        $organismId = $this->getOrganismOfCurrentUser()->getId();
        $year = $submitConfiguration->getPeriodoTrabajo();
        $configuration = $em->getRepository('sisconeeAppBundle:Configuracion')->getConfigurationByYear ($organismId, $year);

        if ($editForm->isValid()) {

            $configuration->setPlan($submitConfiguration->getPlan());

            // updating annual plan for base entity
            $baseEntity = $em->getRepository('sisconeeAppBundle:Entidad')->getBaseEntity(
                $organismId
            );

            $annualPlanEntity = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->getAnnualPlanOfEntityInAYear($baseEntity->getId(), $configuration->getPeriodoTrabajo());

            $annualPlanEntity->setPlan ($configuration->getPlan());

            try {
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Los cambios en la configuración fueron realizados satisfactoriamente.');
            }
            catch(Exception $e)
            {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'No se pudo realizar los cambios.'
                );
            }

            return $this->redirect($this->generateUrl('configuracion_edit'));
        }

        return $this->render('sisconeeAdministracionBundle:Configuracion:edit.html.twig', array(
            'entity'      => $configuration,
            'edit_form'   => $editForm->createView(),
            'statusText'  => $configuration->getCerrado() ? "Abrir" : "Cerrar"
        ));
    }

}
