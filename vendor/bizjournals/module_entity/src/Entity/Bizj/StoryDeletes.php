<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoryDeletes
 */
class StoryDeletes extends \Entity\Entity\Base
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
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var string
     */
    private $pub;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $headline;


    /**
     * Set story_id
     *
     * @param integer $storyId
     * @return StoryDeletes
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
     * @return StoryDeletes
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
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return StoryDeletes
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;

        return $this;
    }

    /**
     * Get issue_date
     *
     * @return \DateTime 
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * Set pub
     *
     * @param string $pub
     * @return StoryDeletes
     */
    public function setPub($pub)
    {
        $this->pub = $pub;

        return $this;
    }

    /**
     * Get pub
     *
     * @return string 
     */
    public function getPub()
    {
        return $this->pub;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return StoryDeletes
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set headline
     *
     * @param string $headline
     * @return StoryDeletes
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string 
     */
    public function getHeadline()
    {
        return $this->headline;
    }
}
