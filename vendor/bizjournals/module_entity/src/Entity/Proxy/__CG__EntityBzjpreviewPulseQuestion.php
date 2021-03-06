<?php

namespace Entity\Proxy\__CG__\Entity\Bzjpreview;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PulseQuestion extends \Entity\Bzjpreview\PulseQuestion implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'question_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'question', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'ord', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'option_type', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'is_required', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'results_cache', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'Options', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'Pulse'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'question_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'question', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'ord', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'option_type', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'is_required', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'results_cache', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'Options', '' . "\0" . 'Entity\\Bzjpreview\\PulseQuestion' . "\0" . 'Pulse'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PulseQuestion $proxy) {
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
    public function getQuestionId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestionId', []);

        return parent::getQuestionId();
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
    public function setQuestion($question)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuestion', [$question]);

        return parent::setQuestion($question);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestion', []);

        return parent::getQuestion();
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
    public function setOptionType($optionType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOptionType', [$optionType]);

        return parent::setOptionType($optionType);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptionType', []);

        return parent::getOptionType();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsRequired($isRequired)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsRequired', [$isRequired]);

        return parent::setIsRequired($isRequired);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsRequired()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsRequired', []);

        return parent::getIsRequired();
    }

    /**
     * {@inheritDoc}
     */
    public function setResultsCache($resultsCache)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResultsCache', [$resultsCache]);

        return parent::setResultsCache($resultsCache);
    }

    /**
     * {@inheritDoc}
     */
    public function getResultsCache()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResultsCache', []);

        return parent::getResultsCache();
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
    public function addOption(\Entity\Bzjpreview\PulseQuestionOption $option)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOption', [$option]);

        return parent::addOption($option);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOption(\Entity\Bzjpreview\PulseQuestionOption $option)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOption', [$option]);

        return parent::removeOption($option);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptions', []);

        return parent::getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function setPulse(\Entity\Bzjpreview\Pulse $pulse = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPulse', [$pulse]);

        return parent::setPulse($pulse);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulse()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulse', []);

        return parent::getPulse();
    }

}
