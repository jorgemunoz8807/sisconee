<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="servicio", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"}), @ORM\UniqueConstraint(name="codcliente_EE_UNIQUE", columns={"codcliente_EE"}), @ORM\UniqueConstraint(name="codRF_UNIQUE", columns={"codRF"})}, indexes={@ORM\Index(name="fk_servicio_tipo_servicio1", columns={"id_tipo_servicio"}), @ORM\Index(name="fk_servicio_entidad1", columns={"id_entidad"}), @ORM\Index(name="fk_servicio_municipio", columns={"id_municipio"}), @ORM\Index(name="fk_servicio_provincia1", columns={"id_provincia"})})
 * @ORM\Entity(repositoryClass="ServicioRepository")
 */
class Servicio
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codcliente_EE", type="string", length=10, nullable=true)
     */
    private $codClienteEE;

    /**
     * @var string
     *
     * @ORM\Column(name="codRF", type="string", length=6, nullable=true)
     */
    private $codRutaFolio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="horariopico", type="boolean", nullable=true)
     */
    private $horarioPico;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

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
     * @var \Municipio
     *
     * @ORM\ManyToOne(targetEntity="Municipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id")
     * })
     */
    private $municipio;

    /**
     * @var \Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     * })
     */
    private $provincia;

    /**
     * @var \TipoServicio
     *
     * @ORM\ManyToOne(targetEntity="TipoServicio", inversedBy="servicios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_servicio", referencedColumnName="id")
     * })
     */
    private $tipoServicio;


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
     * Set id
     *
     * @param integer $id
     * @return Servicio
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Servicio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codClienteEE
     *
     * @param string $codClienteEE
     * @return Servicio
     */
    public function setCodClienteEE($codClienteEE)
    {
        $this->codClienteEE = $codClienteEE;

        return $this;
    }

    /**
     * Get codClienteEE
     *
     * @return string
     */
    public function getCodClienteEE()
    {
        return $this->codClienteEE;
    }

    /**
     * Set codRutaFolio
     *
     * @param string $codRutaFolio
     * @return Servicio
     */
    public function setCodRutaFolio($codRutaFolio)
    {
        $this->codRutaFolio = $codRutaFolio;

        return $this;
    }

    /**
     * Get codRutaFolio
     *
     * @return string
     */
    public function getCodRutaFolio()
    {
        return $this->codRutaFolio;
    }

    /**
     * Set horarioPico
     *
     * @param boolean $horarioPico
     * @return Servicio
     */
    public function setHorarioPico($horarioPico)
    {
        $this->horarioPico = $horarioPico;

        return $this;
    }

    /**
     * Get horarioPico
     *
     * @return boolean
     */
    public function getHorarioPico()
    {
        return $this->horarioPico;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Servicio
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set entidad
     *
     * @param \sisconee\AppBundle\Entity\Entidad $entidad
     * @return Servicio
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
     * Set municipio
     *
     * @param \sisconee\AppBundle\Entity\Municipio $municipio
     * @return Servicio
     */
    public function setMunicipio(\sisconee\AppBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \sisconee\AppBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set provincia
     *
     * @param \sisconee\AppBundle\Entity\Provincia $provincia
     * @return Servicio
     */
    public function setProvincia(\sisconee\AppBundle\Entity\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \sisconee\AppBundle\Entity\Provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set tipoServicio
     *
     * @param \sisconee\AppBundle\Entity\TipoServicio $tipoServicio
     * @return Servicio
     */
    public function setTipoServicio(\sisconee\AppBundle\Entity\TipoServicio $tipoServicio = null)
    {
        $this->tipoServicio = $tipoServicio;

        return $this;
    }

    /**
     * Get tipoServicio
     *
     * @return \sisconee\AppBundle\Entity\TipoServicio
     */
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
