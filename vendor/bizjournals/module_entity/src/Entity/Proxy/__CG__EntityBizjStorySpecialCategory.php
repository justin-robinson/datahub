<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class StorySpecialCategory extends \Entity\Bizj\StorySpecialCategory implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'special_cat_id', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'StoryRead');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'special_cat_id', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\StorySpecialCategory' . "\0" . 'StoryRead');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (StorySpecialCategory $proxy) {
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
    public function setSpecialCatId($specialCatId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpecialCatId', array($specialCatId));

        return parent::setSpecialCatId($specialCatId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpecialCatId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpecialCatId', array());

        return parent::getSpecialCatId();
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
    public function setStoryRead(\Entity\Bizj\StoryRead $storyRead = NULL)
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
