<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoryPerson
 */
class StoryPerson extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var integer
     */
    private $person_id;

    /**
     * @var integer
     */
    private $weight = 0;

    /**
     * @var integer
     */
    private $frequency = 0;

    /**
     * @var \Entity\Bizj\StoryRead
     */
    private $StoryRead;


    /**
     * Set story_id
     *
     * @param integer $storyId
     * @return StoryPerson
     */
    public function setStoryId($storyId)
    {
        $this->story_id = $storyId;

        return $this;
    }

    /**
     * Get story_id
     *
     * @return integer 
     */
    public function getStoryId()
    {
        return $this->story_id;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return StoryPerson
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set person_id
     *
     * @param integer $personId
     * @return StoryPerson
     */
    public function setPersonId($personId)
    {
        $this->person_id = $personId;

        return $this;
    }

    /**
     * Get person_id
     *
     * @return integer 
     */
    public function getPersonId()
    {
        return $this->person_id;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return StoryPerson
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     * @return StoryPerson
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set StoryRead
     *
     * @param \Entity\Bizj\StoryRead $storyRead
     * @return StoryPerson
     */
    public function setStoryRead(\Entity\Bizj\StoryRead $storyRead = null)
    {
        $this->StoryRead = $storyRead;

        return $this;
    }

    /**
     * Get StoryRead
     *
     * @return \Entity\Bizj\StoryRead 
     */
    public function getStoryRead()
    {
        return $this->StoryRead;
    }
}