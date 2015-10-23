<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * PlanMensualServicio
 *
 * @ORM\Table(name="plan_mensual_servicio", indexes={@ORM\Index(name="fk_plan_mensual_general_servicio_servicio1", columns={"id_servicio"})})
 * @ORM\Entity(repositoryClass="PlanRepository")
 */
class PlanMensualServicio
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
     * @Assert\Range(
     *      min = "0",
     *      minMessage = "El plan debe ser un valor positivo."
     *)
     */
    private $plan;

    /**
     * @var integer
     *
     * @ORM\Column(name="plan_horariopico", type="integer", nullable=true)
     * @Assert\Range(
     *      min = "0",
     *      minMessage = "El plan para el horario pico debe ser un valor positivo."
     *)
     */
    private $planHorarioPico;

    /**
     * @var integer
     *
     * @ORM\Column(name="mes", type="integer", nullable=true)
     */
    private $mes;

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
     * @return PlanMensualServicio
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
     * Set planHorarioPico
     *
     * @param integer $planHorarioPico
     * @return PlanMensualServicio
     */
    public function setPlanHorarioPico($planHorarioPico)
    {
        $this->planHorarioPico = $planHorarioPico;

        return $this;
    }

    /**
     * Get planHorarioPico
     *
     * @return integer 
     */
    public function getPlanHorarioPico()
    {
        return $this->planHorarioPico;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     * @return PlanMensualServicio
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return PlanMensualServicio
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
     * @return PlanMensualServicio
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
}
