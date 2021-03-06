<?php

namespace Entity\Proxy\__CG__\Entity\Medialibrary;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class GalleryMedia extends \Entity\Medialibrary\GalleryMedia implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'gallery_id', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'ord', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'crop_data', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'title', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'caption', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'Gallery', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'Media'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'gallery_id', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'ord', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'crop_data', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'title', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'caption', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'Gallery', '' . "\0" . 'Entity\\Medialibrary\\GalleryMedia' . "\0" . 'Media'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (GalleryMedia $proxy) {
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
    public function setGalleryId($galleryId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGalleryId', [$galleryId]);

        return parent::setGalleryId($galleryId);
    }

    /**
     * {@inheritDoc}
     */
    public function getGalleryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGalleryId', []);

        return parent::getGalleryId();
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
    public function setOrd($ord)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrd', [$ord]);

        return parent::setOrd($ord);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrd()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrd', []);

        return parent::getOrd();
    }

    /**
     * {@inheritDoc}
     */
    public function setCropData($cropData)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCropData', [$cropData]);

        return parent::setCropData($cropData);
    }

    /**
     * {@inheritDoc}
     */
    public function getCropData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCropData', []);

        return parent::getCropData();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', [$title]);

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', []);

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setCaption($caption)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaption', [$caption]);

        return parent::setCaption($caption);
    }

    /**
     * {@inheritDoc}
     */
    public function getCaption()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaption', []);

        return parent::getCaption();
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
    public function setGallery(\Entity\Medialibrary\Gallery $gallery = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGallery', [$gallery]);

        return parent::setGallery($gallery);
    }

    /**
     * {@inheritDoc}
     */
    public function getGallery()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGallery', []);

        return parent::getGallery();
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
