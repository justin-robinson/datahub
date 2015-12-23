<?php

namespace Entity\Bzjpreview;

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
     * @var \Entity\Bzjpreview\StoryRead
     */
    private $StoryRead;


    /**
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return StoryPerson
     */
    public function setStoryId($storyId)
    {
        $this->story_id = $storyId;

        return $this;
    }

    /**
     * Get storyId
     *
     * @return integer
     */
    public function getStoryId()
    {
        return $this->story_id;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StoryPerson
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set personId
     *
     * @param integer $personId
     *
     * @return StoryPerson
     */
    public function setPersonId($personId)
    {
        $this->person_id = $personId;

        return $this;
    }

    /**
     * Get personId
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
     *
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
     *
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
     * Set storyRead
     *
     * @param \Entity\Bzjpreview\StoryRead $storyRead
     *
     * @return StoryPerson
     */
    public function setStoryRead(\Entity\Bzjpreview\StoryRead $storyRead = null)
    {
        $this->StoryRead = $storyRead;

        return $this;
    }

    /**
     * Get storyRead
     *
     * @return \Entity\Bzjpreview\StoryRead
     */
    public function getStoryRead()
    {
        return $this->StoryRead;
    }
}

