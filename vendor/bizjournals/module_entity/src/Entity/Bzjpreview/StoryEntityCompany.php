<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \Entity\Bzjpreview\StoryRead
     */
    private $StoryRead;


    /**
     * Set id
     *
     * @param integer $id
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
     * Set story_id
     *
     * @param integer $storyId
     * @return StoryEntityCompany
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
     * Set name
     *
     * @param string $name
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
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return StoryEntityCompany
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
     * Set normalized_name
     *
     * @param string $normalizedName
     * @return StoryEntityCompany
     */
    public function setNormalizedName($normalizedName)
    {
        $this->normalized_name = $normalizedName;

        return $this;
    }

    /**
     * Get normalized_name
     *
     * @return string 
     */
    public function getNormalizedName()
    {
        return $this->normalized_name;
    }

    /**
     * Set StoryRead
     *
     * @param \Entity\Bzjpreview\StoryRead $storyRead
     * @return StoryEntityCompany
     */
    public function setStoryRead(\Entity\Bzjpreview\StoryRead $storyRead = null)
    {
        $this->StoryRead = $storyRead;

        return $this;
    }

    /**
     * Get StoryRead
     *
     * @return \Entity\Bzjpreview\StoryRead 
     */
    public function getStoryRead()
    {
        return $this->StoryRead;
    }
}
