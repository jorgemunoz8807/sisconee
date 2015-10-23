<?php

namespace Proxies\__CG__\sisconee\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Servicio extends \sisconee\AppBundle\Entity\Servicio implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'id', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'nombre', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'codClienteEE', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'codRutaFolio', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'horarioPico', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'activo', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'entidad', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'municipio', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'provincia', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'tipoServicio');
        }

        return array('__isInitialized__', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'id', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'nombre', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'codClienteEE', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'codRutaFolio', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'horarioPico', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'activo', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'entidad', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'municipio', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'provincia', '' . "\0" . 'sisconee\\AppBundle\\Entity\\Servicio' . "\0" . 'tipoServicio');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Servicio $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', array($nombre));

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', array());

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodClienteEE($codClienteEE)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodClienteEE', array($codClienteEE));

        return parent::setCodClienteEE($codClienteEE);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodClienteEE()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodClienteEE', array());

        return parent::getCodClienteEE();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodRutaFolio($codRutaFolio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodRutaFolio', array($codRutaFolio));

        return parent::setCodRutaFolio($codRutaFolio);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodRutaFolio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodRutaFolio', array());

        return parent::getCodRutaFolio();
    }

    /**
     * {@inheritDoc}
     */
    public function setHorarioPico($horarioPico)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHorarioPico', array($horarioPico));

        return parent::setHorarioPico($horarioPico);
    }

    /**
     * {@inheritDoc}
     */
    public function getHorarioPico()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHorarioPico', array());

        return parent::getHorarioPico();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivo($activo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivo', array($activo));

        return parent::setActivo($activo);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivo', array());

        return parent::getActivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntidad(\sisconee\AppBundle\Entity\Entidad $entidad = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEntidad', array($entidad));

        return parent::setEntidad($entidad);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntidad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEntidad', array());

        return parent::getEntidad();
    }

    /**
     * {@inheritDoc}
     */
    public function setMunicipio(\sisconee\AppBundle\Entity\Municipio $municipio = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMunicipio', array($municipio));

        return parent::setMunicipio($municipio);
    }

    /**
     * {@inheritDoc}
     */
    public function getMunicipio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunicipio', array());

        return parent::getMunicipio();
    }

    /**
     * {@inheritDoc}
     */
    public function setProvincia(\sisconee\AppBundle\Entity\Provincia $provincia = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProvincia', array($provincia));

        return parent::setProvincia($provincia);
    }

    /**
     * {@inheritDoc}
     */
    public function getProvincia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProvincia', array());

        return parent::getProvincia();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoServicio(\sisconee\AppBundle\Entity\TipoServicio $tipoServicio = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoServicio', array($tipoServicio));

        return parent::setTipoServicio($tipoServicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoServicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoServicio', array());

        return parent::getTipoServicio();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

}