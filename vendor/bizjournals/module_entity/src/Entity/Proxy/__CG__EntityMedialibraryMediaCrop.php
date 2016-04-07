<?php

namespace Entity\Proxy\__CG__\Entity\Medialibrary;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MediaCrop extends \Entity\Medialibrary\MediaCrop implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = [];



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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'crop_id', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'ratio', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'cropdata', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'is_default', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'Media'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'crop_id', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'ratio', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'cropdata', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'is_default', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\MediaCrop' . "\0" . 'Media'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MediaCrop $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
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
    public function getCropId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCropId', []);

        return parent::getCropId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMediaId($mediaId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMediaId', [$mediaId]);

        return parent::setMediaId($mediaId);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaId', []);

        return parent::getMediaId();
    }

    /**
     * {@inheritDoc}
     */
    public function setRatio($ratio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRatio', [$ratio]);

        return parent::setRatio($ratio);
    }

    /**
     * {@inheritDoc}
     */
    public function getRatio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRatio', []);

        return parent::getRatio();
    }

    /**
     * {@inheritDoc}
     */
    public function setCropdata($cropdata)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCropdata', [$cropdata]);

        return parent::setCropdata($cropdata);
    }

    /**
     * {@inheritDoc}
     */
    public function getCropdata()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCropdata', []);

        return parent::getCropdata();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsDefault($isDefault)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsDefault', [$isDefault]);

        return parent::setIsDefault($isDefault);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsDefault()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsDefault', []);

        return parent::getIsDefault();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setMedia(\Entity\Medialibrary\Media $media = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMedia', [$media]);

        return parent::setMedia($media);
    }

    /**
     * {@inheritDoc}
     */
    public function getMedia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMedia', []);

        return parent::getMedia();
    }

}
