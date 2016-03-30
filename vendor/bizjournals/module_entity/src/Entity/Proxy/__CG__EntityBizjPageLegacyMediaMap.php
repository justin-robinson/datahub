<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PageLegacyMediaMap extends \Entity\Bizj\PageLegacyMediaMap implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'media_id', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'media_type', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'caption', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'alt_text', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'link_url', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'ord', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'title', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'flag', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'Page'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'media_id', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'media_type', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'caption', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'alt_text', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'link_url', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'ord', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'title', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'flag', '' . "\0" . 'Entity\\Bizj\\PageLegacyMediaMap' . "\0" . 'Page'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PageLegacyMediaMap $proxy) {
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
    public function setPageId($pageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageId', [$pageId]);

        return parent::setPageId($pageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageId', []);

        return parent::getPageId();
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
    public function setMediaType($mediaType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMediaType', [$mediaType]);

        return parent::setMediaType($mediaType);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaType', []);

        return parent::getMediaType();
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
    public function setAltText($altText)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAltText', [$altText]);

        return parent::setAltText($altText);
    }

    /**
     * {@inheritDoc}
     */
    public function getAltText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAltText', []);

        return parent::getAltText();
    }

    /**
     * {@inheritDoc}
     */
    public function setLinkUrl($linkUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLinkUrl', [$linkUrl]);

        return parent::setLinkUrl($linkUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getLinkUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLinkUrl', []);

        return parent::getLinkUrl();
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
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getOrd();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrd', []);

        return parent::getOrd();
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
    public function setFlag($flag)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFlag', [$flag]);

        return parent::setFlag($flag);
    }

    /**
     * {@inheritDoc}
     */
    public function getFlag()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFlag', []);

        return parent::getFlag();
    }

    /**
     * {@inheritDoc}
     */
    public function setPage(\Entity\Bizj\Page $page = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPage', [$page]);

        return parent::setPage($page);
    }

    /**
     * {@inheritDoc}
     */
    public function getPage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPage', []);

        return parent::getPage();
    }

}
