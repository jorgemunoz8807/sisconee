<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LecturaDiariaServicio
 *
 * @ORM\Table(name="lectura_diaria_servicio", indexes={@ORM\Index(name="fk_lectura_diariagen_servicio_servicio1", columns={"id_servicio"})})
 * @ORM\Entity(repositoryClass="LecturaDiariaServicioRepository")
 */
class LecturaDiariaServicio
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
     * @ORM\Column(name="consumo", type="integer", nullable=true)
     */
    private $consumo;

    /**
     * @var integer
     *
     * @ORM\Column(name="plan_horariopico", type="integer", nullable=true)
     */
    private $planHorariopico;

    /**
     * @var integer
     *
     * @ORM\Column(name="consumo_horariopico", type="integer", nullable=true)
     */
    private $consumoHorariopico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \Servicio
     *
     * @ORM\ManyToOne(targetEntity="Servicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_servicio", referencedColumnName="id")
     * })
     */
    private $idServicio;



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
     * @return LecturaDiariaServicio
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
     * Set consumo
     *
     * @param integer $consumo
     * @return LecturaDiariaServicio
     */
    public function setConsumo($consumo)
    {
        $this->consumo = $consumo;

        return $this;
    }

    /**
     * Get consumo
     *
     * @return integer 
     */
    public function getConsumo()
    {
        return $this->consumo;
    }

    /**
     * Set planHorariopico
     *
     * @param integer $planHorariopico
     * @return LecturaDiariaServicio
     */
    public function setPlanHorariopico($planHorariopico)
    {
        $this->planHorariopico = $planHorariopico;

        return $this;
    }

    /**
     * Get planHorariopico
     *
     * @return integer 
     */
    public function getPlanHorariopico()
    {
        return $this->planHorariopico;
    }

    /**
     * Set consumoHorariopico
     *
     * @param integer $consumoHorariopico
     * @return LecturaDiariaServicio
     */
    public function setConsumoHorariopico($consumoHorariopico)
    {
        $this->consumoHorariopico = $consumoHorariopico;

        return $this;
    }

    /**
     * Get consumoHorariopico
     *
     * @return integer 
     */
    public function getConsumoHorariopico()
    {
        return $this->consumoHorariopico;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return LecturaDiariaServicio
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idServicio
     *
     * @param \sisconee\AppBundle\Entity\Servicio $idServicio
     * @return LecturaDiariaServicio
     */
    public function setIdServicio(\sisconee\AppBundle\Entity\Servicio $idServicio = null)
    {
        $this->idServicio = $idServicio;

        return $this;
    }

    /**
     * Get idServicio
     *
     * @return \sisconee\AppBundle\Entity\Servicio 
     */
    public function getIdServicio()
    {
        return $this->idServicio;
    }
}
