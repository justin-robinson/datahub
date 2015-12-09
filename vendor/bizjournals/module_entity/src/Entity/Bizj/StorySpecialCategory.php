<?php

namespace Entity\Bizj;

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
     * @var \Entity\Bizj\StoryRead
     */
    private $StoryRead;


    /**
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return StorySpecialCategory
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
     * Set specialCatId
     *
     * @param integer $specialCatId
     *
     * @return StorySpecialCategory
     */
    public function setSpecialCatId($specialCatId)
    {
        $this->special_cat_id = $specialCatId;

        return $this;
    }

    /**
     * Get specialCatId
     *
     * @return integer
     */
    public function getSpecialCatId()
    {
        return $this->special_cat_id;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StorySpecialCategory
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
     * Set storyRead
     *
     * @param \Entity\Bizj\StoryRead $storyRead
     *
     * @return StorySpecialCategory
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

