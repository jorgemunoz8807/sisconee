<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trazas
 *
 * @ORM\Table(name="trazas", indexes={@ORM\Index(name="fk_trazas_usuario1", columns={"id_usuario"})})
 * @ORM\Entity(repositoryClass="TrazasRepository")
 */
class Trazas
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
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=45, nullable=true)
     */
    private $operacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=45, nullable=true)
     */
    private $tabla;

    /**
     * @var integer
     *
     * @ORM\Column(name="registro", type="integer", nullable=true)
     */
    private $registro;

    /**
     * @var string
     *
     * @ORM\Column(name="datos", type="string", length=255, nullable=true)
     */
    private $datos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;


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
     * Set operacion
     *
     * @param string $operacion
     * @return Trazas
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return string
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set tabla
     *
     * @param string $tabla
     * @return Trazas
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    /**
     * Get tabla
     *
     * @return string
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set registro
     *
     * @param integer $registro
     * @return Trazas
     */
    public function setRegistro($registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get registro
     *
     * @return integer
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set datos
     *
     * @param string $datos
     * @return Trazas
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;

        return $this;
    }

    /**
     * Get datos
     *
     * @return string
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Trazas
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set idUsuario
     *
     * @param \sisconee\AppBundle\Entity\Usuario $idUsuario
     * @return Trazas
     */
    public function setIdUsuario(\sisconee\AppBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \sisconee\AppBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

}
