<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion", indexes={@ORM\Index(name="fk_configuracion_organismo", columns={"id_organismo"})})
 * @ORM\Entity(repositoryClass="ConfiguracionRepository")
 */
class Configuracion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Organismo
     *
     * @ORM\ManyToOne(targetEntity="Organismo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_organismo", referencedColumnName="id")
     * })
     */
    private $organismo;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodo_trabajo", type="integer", nullable=true)
     */
    private $periodoTrabajo;

    /**
     * @var integer
     *
     * @ORM\Column(name="plan", type="integer", nullable=true)
     */
    private $plan;


    /**
     * @var boolean
     *
     * @ORM\Column(name="cerrado", type="boolean", nullable=false)
     */
    private $cerrado;

    /**
     * Get cerrado
     *
     * @return bool
     */
    public function getCerrado()
    {
        return $this->cerrado;
    }

    public function setCerrado ($cerrado)
    {
        $this->cerrado = $cerrado;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set organismo
     *
     * @param \sisconee\AppBundle\Entity\Organismo $organismo
     * @return Configuracion
     */
    public function setOrganismo(\sisconee\AppBundle\Entity\Organismo $organismo = null)
    {
        $this->organismo = $organismo;

        return $this;
    }

    /**
     * Get organismo
     *
     * @return \sisconee\AppBundle\Entity\Organismo
     */
    public function getOrganismo()
    {
        return $this->organismo;
    }

    /**
     * Set periodoTrabajo
     *
     * @param integer $periodoTrabajo
     * @return Configuracion
     */
    public function setPeriodoTrabajo($periodoTrabajo)
    {
        $this->periodoTrabajo = $periodoTrabajo;

        return $this;
    }

    /**
     * Get periodoTrabajo
     *
     * @return integer
     */
    public function getPeriodoTrabajo()
    {
        return $this->periodoTrabajo;
    }

    /**
     * Set plan
     *
     * @param integer $plan
     * @return Configuracion
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return integer 
     */
    public function getPlan()
    {
        return $this->plan;
    }

    public function __toString()
    {
        return $this-> getPeriodoTrabajo().'_'.getPlan();
    }
}
