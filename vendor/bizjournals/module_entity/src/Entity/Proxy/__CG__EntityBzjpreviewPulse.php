<?php

namespace Entity\Proxy\__CG__\Entity\Bzjpreview;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Pulse extends \Entity\Bzjpreview\Pulse implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'pulse_type', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'primary_market_id', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'headline', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'short_headline', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'description', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'start_time', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'end_time', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_evergreen', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_featured', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_national', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'has_sponsor', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'allow_comments', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'display_results', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'meta_title', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'meta_description', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'estimated_response_count', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Crossrefs', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Media', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Markets', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Questions', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'LeadinGroups'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'pulse_type', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'primary_market_id', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'headline', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'short_headline', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'description', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'start_time', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'end_time', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_evergreen', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_featured', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'is_national', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'has_sponsor', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'allow_comments', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'display_results', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'meta_title', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'meta_description', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'estimated_response_count', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Crossrefs', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Media', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Markets', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'Questions', '' . "\0" . 'Entity\\Bzjpreview\\Pulse' . "\0" . 'LeadinGroups'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Pulse $proxy) {
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
    public function setPulseId($pulseId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPulseId', [$pulseId]);

        return parent::setPulseId($pulseId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulseId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulseId', []);

        return parent::getPulseId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPulseType($pulseType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPulseType', [$pulseType]);

        return parent::setPulseType($pulseType);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulseType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulseType', []);

        return parent::getPulseType();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrimaryMarketId($primaryMarketId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrimaryMarketId', [$primaryMarketId]);

        return parent::setPrimaryMarketId($primaryMarketId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrimaryMarketId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrimaryMarketId', []);

        return parent::getPrimaryMarketId();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadline($headline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadline', [$headline]);

        return parent::setHeadline($headline);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadline', []);

        return parent::getHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setShortHeadline($shortHeadline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShortHeadline', [$shortHeadline]);

        return parent::setShortHeadline($shortHeadline);
    }

    /**
     * {@inheritDoc}
     */
    public function getShortHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShortHeadline', []);

        return parent::getShortHeadline();
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
    public function setStartTime($startTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartTime', [$startTime]);

        return parent::setStartTime($startTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartTime', []);

        return parent::getStartTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndTime($endTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndTime', [$endTime]);

        return parent::setEndTime($endTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndTime', []);

        return parent::getEndTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsEvergreen($isEvergreen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsEvergreen', [$isEvergreen]);

        return parent::setIsEvergreen($isEvergreen);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsEvergreen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsEvergreen', []);

        return parent::getIsEvergreen();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsFeatured($isFeatured)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsFeatured', [$isFeatured]);

        return parent::setIsFeatured($isFeatured);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsFeatured()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsFeatured', []);

        return parent::getIsFeatured();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsNational($isNational)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsNational', [$isNational]);

        return parent::setIsNational($isNational);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsNational()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsNational', []);

        return parent::getIsNational();
    }

    /**
     * {@inheritDoc}
     */
    public function setHasSponsor($hasSponsor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHasSponsor', [$hasSponsor]);

        return parent::setHasSponsor($hasSponsor);
    }

    /**
     * {@inheritDoc}
     */
    public function getHasSponsor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHasSponsor', []);

        return parent::getHasSponsor();
    }

    /**
     * {@inheritDoc}
     */
    public function setAllowComments($allowComments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAllowComments', [$allowComments]);

        return parent::setAllowComments($allowComments);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllowComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllowComments', []);

        return parent::getAllowComments();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplayResults($displayResults)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisplayResults', [$displayResults]);

        return parent::setDisplayResults($displayResults);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayResults()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayResults', []);

        return parent::getDisplayResults();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaTitle($metaTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetaTitle', [$metaTitle]);

        return parent::setMetaTitle($metaTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetaTitle', []);

        return parent::getMetaTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaDescription($metaDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetaDescription', [$metaDescription]);

        return parent::setMetaDescription($metaDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetaDescription', []);

        return parent::getMetaDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstimatedResponseCount($estimatedResponseCount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstimatedResponseCount', [$estimatedResponseCount]);

        return parent::setEstimatedResponseCount($estimatedResponseCount);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstimatedResponseCount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstimatedResponseCount', []);

        return parent::getEstimatedResponseCount();
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
    public function setDeletedAt($deletedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deletedAt]);

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function addCrossref(\Entity\Bzjpreview\PulseCrossref $crossref)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCrossref', [$crossref]);

        return parent::addCrossref($crossref);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCrossref(\Entity\Bzjpreview\PulseCrossref $crossref)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCrossref', [$crossref]);

        return parent::removeCrossref($crossref);
    }

    /**
     * {@inheritDoc}
     */
    public function getCrossrefs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCrossrefs', []);

        return parent::getCrossrefs();
    }

    /**
     * {@inheritDoc}
     */
    public function addMedia(\Entity\Bzjpreview\PulseMedia $medium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMedia', [$medium]);

        return parent::addMedia($medium);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMedia(\Entity\Bzjpreview\PulseMedia $medium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMedia', [$medium]);

        return parent::removeMedia($medium);
    }

    /**
     * {@inheritDoc}
     */
    public function getMedia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMedia', []);

        return parent::getMedia();
    }

    /**
     * {@inheritDoc}
     */
    public function addMarket(\Entity\Bzjpreview\PulseMarketMap $market)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMarket', [$market]);

        return parent::addMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMarket(\Entity\Bzjpreview\PulseMarketMap $market)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMarket', [$market]);

        return parent::removeMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarkets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarkets', []);

        return parent::getMarkets();
    }

    /**
     * {@inheritDoc}
     */
    public function addQuestion(\Entity\Bzjpreview\PulseQuestion $question)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addQuestion', [$question]);

        return parent::addQuestion($question);
    }

    /**
     * {@inheritDoc}
     */
    public function removeQuestion(\Entity\Bzjpreview\PulseQuestion $question)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeQuestion', [$question]);

        return parent::removeQuestion($question);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestions', []);

        return parent::getQuestions();
    }

    /**
     * {@inheritDoc}
     */
    public function addLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLeadinGroup', [$leadinGroup]);

        return parent::addLeadinGroup($leadinGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLeadinGroup', [$leadinGroup]);

        return parent::removeLeadinGroup($leadinGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function getLeadinGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLeadinGroups', []);

        return parent::getLeadinGroups();
    }

}
