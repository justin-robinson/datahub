<?php

namespace Entity\Bizj;

/**
 * StoryEntityCompany
 */
class StoryEntityCompany extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $eoc;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var string
     */
    private $normalized_name;

    /**
     * @var \Entity\Bizj\StoryRead
     */
    private $StoryRead;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return StoryEntityCompany
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return StoryEntityCompany
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
     * Set name
     *
     * @param string $name
     *
     * @return StoryEntityCompany
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set eoc
     *
     * @param string $eoc
     *
     * @return StoryEntityCompany
     */
    public function setEoc($eoc)
    {
        $this->eoc = $eoc;

        return $this;
    }

    /**
     * Get eoc
     *
     * @return string
     */
    public function getEoc()
    {
        return $this->eoc;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StoryEntityCompany
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
     * Set normalizedName
     *
     * @param string $normalizedName
     *
     * @return StoryEntityCompany
     */
    public function setNormalizedName($normalizedName)
    {
        $this->normalized_name = $normalizedName;

        return $this;
    }

    /**
     * Get normalizedName
     *
     * @return string
     */
    public function getNormalizedName()
    {
        return $this->normalized_name;
    }

    /**
     * Set storyRead
     *
     * @param \Entity\Bizj\StoryRead $storyRead
     *
     * @return StoryEntityCompany
     */
    public function setStoryRead(\Entity\Bizj\StoryRead $storyRead = null)
    {
        $this->StoryRead = $storyRead;

        return $this;
    }

    /**
     * Get storyRead
     *
     * @return \Entity\Bizj\StoryRead
     */
    public function getStoryRead()
    {
        return $this->StoryRead;
    }
}

