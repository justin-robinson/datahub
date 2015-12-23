<?php

namespace Entity\Proxy\__CG__\Entity\Bzjpreview;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class StoryImage extends \Entity\Bzjpreview\StoryImage implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'image_id', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'major_rev', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'rev_time', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'caption', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'media_producer', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'image_data', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'width', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'height', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'size_hint', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'display_order', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'StoryRead');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'image_id', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'major_rev', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'rev_time', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'caption', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'media_producer', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'image_data', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'width', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'height', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'size_hint', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'display_order', '' . "\0" . 'Entity\\Bzjpreview\\StoryImage' . "\0" . 'StoryRead');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (StoryImage $proxy) {
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
    public function setImageId($imageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageId', array($imageId));

        return parent::setImageId($imageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageId', array());

        return parent::getImageId();
    }

    /**
     * {@inheritDoc}
     */
    public function setCTime($cTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCTime', array($cTime));

        return parent::setCTime($cTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getCTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCTime', array());

        return parent::getCTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setStoryId($storyId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStoryId', array($storyId));

        return parent::setStoryId($storyId);
    }

    /**
     * {@inheritDoc}
     */
    public function getStoryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStoryId', array());

        return parent::getStoryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMajorRev($majorRev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMajorRev', array($majorRev));

        return parent::setMajorRev($majorRev);
    }

    /**
     * {@inheritDoc}
     */
    public function getMajorRev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMajorRev', array());

        return parent::getMajorRev();
    }

    /**
     * {@inheritDoc}
     */
    public function setRevTime($revTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRevTime', array($revTime));

        return parent::setRevTime($revTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRevTime', array());

        return parent::getRevTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setCaption($caption)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaption', array($caption));

        return parent::setCaption($caption);
    }

    /**
     * {@inheritDoc}
     */
    public function getCaption()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaption', array());

        return parent::getCaption();
    }

    /**
     * {@inheritDoc}
     */
    public function setMediaProducer($mediaProducer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMediaProducer', array($mediaProducer));

        return parent::setMediaProducer($mediaProducer);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaProducer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaProducer', array());

        return parent::getMediaProducer();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageData($imageData)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageData', array($imageData));

        return parent::setImageData($imageData);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageData', array());

        return parent::getImageData();
    }

    /**
     * {@inheritDoc}
     */
    public function setWidth($width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWidth', array($width));

        return parent::setWidth($width);
    }

    /**
     * {@inheritDoc}
     */
    public function getWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWidth', array());

        return parent::getWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeight($height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeight', array($height));

        return parent::setHeight($height);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeight', array());

        return parent::getHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setSizeHint($sizeHint)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSizeHint', array($sizeHint));

        return parent::setSizeHint($sizeHint);
    }

    /**
     * {@inheritDoc}
     */
    public function getSizeHint()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSizeHint', array());

        return parent::getSizeHint();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplayOrder($displayOrder)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisplayOrder', array($displayOrder));

        return parent::setDisplayOrder($displayOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayOrder()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayOrder', array());

        return parent::getDisplayOrder();
    }

    /**
     * {@inheritDoc}
     */
    public function setStoryRead(\Entity\Bzjpreview\StoryRead $storyRead = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStoryRead', array($storyRead));

        return parent::setStoryRead($storyRead);
    }

    /**
     * {@inheritDoc}
     */
    public function getStoryRead()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStoryRead', array());

        return parent::getStoryRead();
    }

}
