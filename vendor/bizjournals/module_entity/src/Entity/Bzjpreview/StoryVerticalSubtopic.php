<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoryVerticalSubtopic
 */
class StoryVerticalSubtopic extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var integer
     */
    private $vertical_subtopic_id;

    /**
     * @var string
     */
    private $market;

    /**
     * @var \DateTime
     */
    private $story_date;

    /**
     * @var integer
     */
    private $relevance = 0;

    /**
     * @var string
     */
    private $is_daily = '1';

    /**
     * @var \Entity\Bzjpreview\StoryRead
     */
    private $StoryRead;


    /**
     * Set story_id
     *
     * @param integer $storyId
     * @return StoryVerticalSubtopic
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
     * Set vertical_subtopic_id
     *
     * @param integer $verticalSubtopicId
     * @return StoryVerticalSubtopic
     */
    public function setVerticalSubtopicId($verticalSubtopicId)
    {
        $this->vertical_subtopic_id = $verticalSubtopicId;

        return $this;
    }

    /**
     * Get vertical_subtopic_id
     *
     * @return integer 
     */
    public function getVerticalSubtopicId()
    {
        return $this->vertical_subtopic_id;
    }

    /**
     * Set market
     *
     * @param string $market
     * @return StoryVerticalSubtopic
     */
    public function setMarket($market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return string 
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * Set story_date
     *
     * @param \DateTime $storyDate
     * @return StoryVerticalSubtopic
     */
    public function setStoryDate($storyDate)
    {
        $this->story_date = $storyDate;

        return $this;
    }

    /**
     * Get story_date
     *
     * @return \DateTime 
     */
    public function getStoryDate()
    {
        return $this->story_date;
    }

    /**
     * Set relevance
     *
     * @param integer $relevance
     * @return StoryVerticalSubtopic
     */
    public function setRelevance($relevance)
    {
        $this->relevance = $relevance;

        return $this;
    }

    /**
     * Get relevance
     *
     * @return integer 
     */
    public function getRelevance()
    {
        return $this->relevance;
    }

    /**
     * Set is_daily
     *
     * @param string $isDaily
     * @return StoryVerticalSubtopic
     */
    public function setIsDaily($isDaily)
    {
        $this->is_daily = $isDaily;

        return $this;
    }

    /**
     * Get is_daily
     *
     * @return string 
     */
    public function getIsDaily()
    {
        return $this->is_daily;
    }

    /**
     * Set StoryRead
     *
     * @param \Entity\Bzjpreview\StoryRead $storyRead
     * @return StoryVerticalSubtopic
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
