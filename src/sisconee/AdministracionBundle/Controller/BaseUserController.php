<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 05/12/2014
 * Time: 8:51
 */
namespace sisconee\AdministracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * BaseUser controller.
 *
 */
class BaseUserController extends Controller
{

    private $securityContext;
    private $currentUser;
    private $currentUserOrganism;
    private $currentUserEntity;

    private function initializeSecurityContext()
    {
        $this->securityContext = $this->container->get('security.context');
    }

    private function initializeCurrentUser()
    {
        if($this->securityContext==null)
            $this->initializeSecurityContext();

        $this->currentUser = $this->securityContext->getToken()->getUser();
    }

    /**
     * Get current authenticated user
     *
     * @return \sisconee\AppBundle\Entity\Usuario
     */
    public function getCurrentUser()
    {
        if($this->currentUser==null)
            $this->initializeCurrentUser();
        return $this->currentUser;
    }

    /**
     * Get entity of the current user
     *
     * @return \sisconee\AppBundle\Entity\Entidad
     */
    public function getEntityOfCurrentUser()
    {
        if($this->currentUser==null)
            $this->initializeCurrentUser();

        $this->currentUserEntity = $this->currentUser->getEntidad();
        return $this->currentUserEntity;
    }

    /**
     * Get organism of the current user
     *
     * @return \sisconee\AppBundle\Entity\Organismo
     */
    public function getOrganismOfCurrentUser()
    {
        if($this->currentUser==null)
            $this->initializeCurrentUser();

        $this->currentUserOrganism = $this->currentUser->getEntidad()->getOrganismo();
        return $this->currentUserOrganism;
    }

    /**
     * Get role of the current user
     *
     * @return \sisconee\AppBundle\Entity\Organismo
     */
    public function getRoleOfCurrentUser()
    {
        if($this->currentUser==null)
            $this->initializeCurrentUser();

        return $this->currentUser->getRol();
    }

    /**
     * Determine if the current user is active.
     *
     * @return Boolean
     */
    public function isActiveCurrentUser()
    {
        if($this->currentUser==null)
            $this->initializeCurrentUser();

        return $this->currentUser->getActivo();
    }

    /**
     * Determine if is logged a user with role 'Planificador Superior'.
     *
     * @return Boolean
     */
    public function isLogged_PlanificadorSuperior()
    {
        if($this->securityContext==null)
            $this->initializeSecurityContext();
        if($this->securityContext->isGranted('ROLE_PLANIFICADOR_SUP'))
            return true;
        return false;
    }

    /**
     * Determine if is logged a user with role 'Planificador Entidad'.
     *
     * @return Boolean
     */
    public function isLogged_PlanificadorEntidad()
    {
        if($this->securityContext==null)
            $this->initializeSecurityContext();
        if($this->securityContext->isGranted('ROLE_PLANIFICADOR_ENT'))
            return true;
        return false;
    }

    /**
     * Determine if is logged a user with role 'Planificador Servicio'.
     *
     * @return Boolean
     */
    public function isLogged_PlanificadorServicio()
    {
        if($this->securityContext==null)
            $this->initializeSecurityContext();
        if($this->securityContext->isGranted('ROLE_PLANIFICADOR_SER'))
            return true;
        return false;
    }

    /**
     * Get the current configuration
     */
    public function getCurrentConfiguration()
    {
        $em = $this->getDoctrine()->getManager();
        $currentOrganismId = $this->getOrganismOfCurrentUser()->getId();
        $year = $this->get('prefixedsessionservice')->get('configuration_year');
        if ($year == null)
            return $em->getRepository('sisconeeAppBundle:Configuracion')->getLastConfiguration($currentOrganismId);
        else
            return $em->getRepository('sisconeeAppBundle:Configuracion')->getConfigurationByYear($currentOrganismId, $year);

    }

    /**
     * Validate the current selected configuration
     * @param $currentConfiguration
     * @param $fromPage
     * @return int indicating if the configuration is valid
     */
    public function validateConfiguration($currentConfiguration, $fromPage)
    {
        //if no configuration for current organism
        if ($currentConfiguration == null) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'No existe ninguna configuración para el organismo '.$this->getOrganismOfCurrentUser().'.'
            );
            /*return $this->render(
                'sisconeeAppBundle:Default:errorConfiguration.html.twig');*/
            return 0;
        }

        //if selected configuration is closed
        if($currentConfiguration->getCerrado()) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'La configuración seleccionada no permite hacer modificacones en el módulo de ' .$fromPage. '.'
            );
            /*return $this->render(
                'sisconeeAppBundle:Default:errorConfiguration.html.twig');*/
            return 0;
        }

        return 1; //current configuration is ok
    }
}