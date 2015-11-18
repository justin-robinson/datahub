<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * StorySpecialCategory
 */
class StorySpecialCategory extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var integer
     */
    private $special_cat_id;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var \Entity\Bzjpreview\StoryRead
     */
    private $StoryRead;


    /**
     * Set story_id
     *
     * @param integer $storyId
     * @return StorySpecialCategory
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
     * Set special_cat_id
     *
     * @param integer $specialCatId
     * @return StorySpecialCategory
     */
    public function setSpecialCatId($specialCatId)
    {
        $this->special_cat_id = $specialCatId;

        return $this;
    }

    /**
     * Get special_cat_id
     *
     * @return integer 
     */
    public function getSpecialCatId()
    {
        return $this->special_cat_id;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return StorySpecialCategory
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
     * Set StoryRead
     *
     * @param \Entity\Bzjpreview\StoryRead $storyRead
     * @return StorySpecialCategory
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
