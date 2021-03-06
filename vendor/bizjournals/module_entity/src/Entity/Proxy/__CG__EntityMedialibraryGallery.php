<?php

namespace Entity\Proxy\__CG__\Entity\Medialibrary;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Gallery extends \Entity\Medialibrary\Gallery implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'gallery_id', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'pub_id', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'category', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'title', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'description', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'gallery_type', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'auto_query', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'is_pub_restricted', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'is_live', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'GalleryMedia'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'gallery_id', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'pub_id', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'category', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'title', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'description', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'gallery_type', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'auto_query', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'is_pub_restricted', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'is_live', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\Gallery' . "\0" . 'GalleryMedia'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Gallery $proxy) {
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
    public function getGalleryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGalleryId', []);

        return parent::getGalleryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPubId($pubId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPubId', [$pubId]);

        return parent::setPubId($pubId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPubId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPubId', []);

        return parent::getPubId();
    }

    /**
     * {@inheritDoc}
     */
    public function setCategory($category)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategory', [$category]);

        return parent::setCategory($category);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategory', []);

        return parent::getCategory();
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
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setGalleryType($galleryType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGalleryType', [$galleryType]);

        return parent::setGalleryType($galleryType);
    }

    /**
     * {@inheritDoc}
     */
    public function getGalleryType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGalleryType', []);

        return parent::getGalleryType();
    }

    /**
     * {@inheritDoc}
     */
    public function setAutoQuery($autoQuery)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAutoQuery', [$autoQuery]);

        return parent::setAutoQuery($autoQuery);
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoQuery()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAutoQuery', []);

        return parent::getAutoQuery();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsPubRestricted($isPubRestricted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsPubRestricted', [$isPubRestricted]);

        return parent::setIsPubRestricted($isPubRestricted);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsPubRestricted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsPubRestricted', []);

        return parent::getIsPubRestricted();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsLive($isLive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsLive', [$isLive]);

        return parent::setIsLive($isLive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsLive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsLive', []);

        return parent::getIsLive();
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
    public function addGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addGalleryMedia', [$galleryMedia]);

        return parent::addGalleryMedia($galleryMedia);
    }

    /**
     * {@inheritDoc}
     */
    public function removeGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeGalleryMedia', [$galleryMedia]);

        return parent::removeGalleryMedia($galleryMedia);
    }

    /**
     * {@inheritDoc}
     */
    public function getGalleryMedia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGalleryMedia', []);

        return parent::getGalleryMedia();
    }

}
