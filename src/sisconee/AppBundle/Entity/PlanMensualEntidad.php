<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanMensualEntidad
 *
 * @ORM\Table(name="plan_mensual_entidad", indexes={@ORM\Index(name="fk_plan_mensual_entidad_entidad1", columns={"id_entidad"})})
 * @ORM\Entity
 */
class PlanMensualEntidad
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
     * @var \Entidad
     *
     * @ORM\ManyToOne(targetEntity="Entidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entidad", referencedColumnName="id")
     * })
     */
    private $entidad;



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
     * @return PlanMensualEntidad
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
     * Set mes
     *
     * @param integer $mes
     * @return PlanMensualEntidad
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
     * @return PlanMensualEntidad
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
     * Set entidad
     *
     * @param \sisconee\AppBundle\Entity\Entidad $entidad
     * @return PlanMensualEntidad
     */
    public function setEntidad(\sisconee\AppBundle\Entity\Entidad $entidad = null)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return \sisconee\AppBundle\Entity\Entidad 
     */
    public function getEntidad()
    {
        return $this->entidad;
    }
}
