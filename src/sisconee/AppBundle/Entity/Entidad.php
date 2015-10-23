<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad
 *
 * @ORM\Table(name="entidad", uniqueConstraints={@ORM\UniqueConstraint(name="codreeup_UNIQUE", columns={"codreeup"}), @ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"}), @ORM\UniqueConstraint(name="siglas_UNIQUE", columns={"siglas"})}, indexes={@ORM\Index(name="fk_entidad_organismo1", columns={"id_organismo"}), @ORM\Index(name="fk_entidad_nae1", columns={"id_nae"}), @ORM\Index(name="fk_entidad_padre", columns={"id_entidad"})})
 * @ORM\Entity(repositoryClass="EntidadRepository")
 */
class Entidad
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
     * @ORM\Column(name="codreeup", type="string", length=5, nullable=true)
     */
    private $codReeup;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="siglas", type="string", length=50, nullable=true)
     */
    private $siglas;

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
     * @var \Entidad
     *
     * @ORM\ManyToOne(targetEntity="Entidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entidad", referencedColumnName="id")
     * })
     */
    private $entidadPadre;

    /**
     * @var \Nae
     *
     * @ORM\ManyToOne(targetEntity="Nae")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nae", referencedColumnName="id")
     * })
     */
    private $nae;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=200, nullable=true)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=100, nullable=true)
     */
    private $telefono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @ORM\OneToMany(targetEntity="Servicio", mappedBy="entidad", cascade={"persist"})
     */
    protected $servicios;

    /**
     * @var \Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     * })
     */
    private $provincia;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
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
     * Set codReeup
     *
     * @param string $codreeup
     * @return Entidad
     */
    public function setCodReeup($codreeup)
    {
        $this->codReeup = $codreeup;

        return $this;
    }

    /**
     * Get codReeup
     *
     * @return string 
     */
    public function getCodReeup()
    {
        return $this->codReeup;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Entidad
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
     * Set siglas
     *
     * @param string $siglas
     * @return Entidad
     */
    public function setSiglas($siglas)
    {
        $this->siglas = $siglas;

        return $this;
    }

    /**
     * Get siglas
     *
     * @return string 
     */
    public function getSiglas()
    {
        return $this->siglas == null? '-':$this->siglas;
    }

    /**
     * Set organismo
     *
     * @param \sisconee\AppBundle\Entity\Organismo $organismo
     * @return Entidad
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
     * Set entidadPadre
     *
     * @param \sisconee\AppBundle\Entity\Entidad $entidad
     * @return Entidad
     */
    public function setEntidadPadre(\sisconee\AppBundle\Entity\Entidad $entidad = null)
    {
        $this->entidadPadre = $entidad;

        return $this;
    }

    /**
     * Get entidadPadre
     *
     * @return \sisconee\AppBundle\Entity\Entidad
     */
    public function getEntidadPadre()
    {
        return $this->entidadPadre;
    }

    /**
     * Set nae
     *
     * @param \sisconee\AppBundle\Entity\Nae $nae
     * @return Entidad
     */
    public function setNae(\sisconee\AppBundle\Entity\Nae $nae = null)
    {
        $this->nae = $nae;

        return $this;
    }

    /**
     * Get nae
     *
     * @return \sisconee\AppBundle\Entity\Nae
     */
    public function getNae()
    {
        return $this->nae;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Entidad
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Entidad
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Entidad
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Entidad
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
     * Get Servicios
     *
     * @return Collection
     */
    public function getServicios()
    {
        return $this->servicios;
    }

    public function __toString()
    {
        //return $this->getSiglas()=='-' ? $this->getNombre() : $this->getSiglas();
        return $this->getNombre() ;

    }

    /**
     * Set provincia
     *
     * @param \sisconee\AppBundle\Entity\Provincia $provincia
     * @return Entidad
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
}
