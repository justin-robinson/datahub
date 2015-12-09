<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PollQuestion extends \Entity\Bizj\PollQuestion implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'poll_question_id', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'poll_id', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'question', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'position', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'type', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'required', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'Answers', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'Poll');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'poll_question_id', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'poll_id', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'question', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'position', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'type', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'required', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'Answers', '' . "\0" . 'Entity\\Bizj\\PollQuestion' . "\0" . 'Poll');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PollQuestion $proxy) {
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
    public function getPollQuestionId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPollQuestionId', array());

        return parent::getPollQuestionId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPollId($pollId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPollId', array($pollId));

        return parent::setPollId($pollId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPollId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPollId', array());

        return parent::getPollId();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion($question)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuestion', array($question));

        return parent::setQuestion($question);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestion', array());

        return parent::getQuestion();
    }

    /**
     * {@inheritDoc}
     */
    public function setPosition($position)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPosition', array($position));

        return parent::setPosition($position);
    }

    /**
     * {@inheritDoc}
     */
    public function getPosition()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPosition', array());

        return parent::getPosition();
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', array($type));

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', array());

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequired($required)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequired', array($required));

        return parent::setRequired($required);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequired()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequired', array());

        return parent::getRequired();
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
    public function addAnswer(\Entity\Bizj\PollQuestionData $answer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAnswer', array($answer));

        return parent::addAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAnswer(\Entity\Bizj\PollQuestionData $answer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAnswer', array($answer));

        return parent::removeAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswers', array());

        return parent::getAnswers();
    }

    /**
     * {@inheritDoc}
     */
    public function setPoll(\Entity\Bizj\Poll $poll = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPoll', array($poll));

        return parent::setPoll($poll);
    }

    /**
     * {@inheritDoc}
     */
    public function getPoll()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPoll', array());

        return parent::getPoll();
    }

}
