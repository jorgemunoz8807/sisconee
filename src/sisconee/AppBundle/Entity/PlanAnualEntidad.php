<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanAnualEntidad
 *
 * @ORM\Table(name="plan_anual_entidad", indexes={@ORM\Index(name="fk_plan_entidad_entidad1", columns={"id_entidad"})})
 * @ORM\Entity(repositoryClass="PlanRepository")

 */
class PlanAnualEntidad
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
     * @param string $plan
     * @return PlanAnualEntidad
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string 
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return PlanAnualEntidad
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
     * @return PlanAnualEntidad
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

    /**
     * Get the description for the annual plan
     *
     * @return string the description
     */
    public function getDescription()
    {
        return 'Entidad: '.$this->getEntidad()->getSiglas().' ---- Plan: '.$this->getPlan();
    }
}
