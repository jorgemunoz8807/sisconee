<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PlanAnualServicio
 *
 * @ORM\Table(name="plan_anual_servicio", indexes={@ORM\Index(name="fk_plan_mensual_general_servicio_servicio1", columns={"id_servicio"})})
 * @ORM\Entity(repositoryClass="PlanRepository")
 */
class PlanAnualServicio
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
     * @var integer
     *
     * @ORM\Column(name="plan", type="integer", nullable=true)
     */
    private $plan;

    /**
     * @var integer
     *
     * @ORM\Column(name="anno", type="integer", nullable=true)
     */
    private $anno;

    /**
     * @var \Servicio
     *
     * @ORM\ManyToOne(targetEntity="Servicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_servicio", referencedColumnName="id")
     * })
     */
    private $servicio;



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
     * Set plan
     *
     * @param integer $plan
     * @return PlanAnualServicio
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

    /**
     * Set anno
     *
     * @param integer $anno
     * @return PlanAnualServicio
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return integer 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set servicio
     *
     * @param \sisconee\AppBundle\Entity\Servicio $servicio
     * @return PlanAnualServicio
     */
    public function setServicio(\sisconee\AppBundle\Entity\Servicio $servicio = null)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return \sisconee\AppBundle\Entity\Servicio 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Get the description for the annual plan
     *
     * @return string the description
     */
    public function getDescription()
    {
        return 'Servicio: '.$this->getServicio()->getNombre().' ---- Plan: '.$this->getPlan();
    }
}
