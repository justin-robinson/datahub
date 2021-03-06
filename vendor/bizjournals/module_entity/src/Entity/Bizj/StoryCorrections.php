<?php

namespace Entity\Bizj;

/**
 * StoryCorrections
 */
class StoryCorrections extends \Entity\Entity\Base
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
    private $market = 'bizjournals';

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var string
     */
    private $is_daily = '0';

    /**
     * @var \Entity\Bizj\StoryRead
     */
    private $StoryRead;


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
     * @return StoryCorrections
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
     * Set market
     *
     * @param string $market
     *
     * @return StoryCorrections
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
     * Set text
     *
     * @param string $text
     *
     * @return StoryCorrections
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StoryCorrections
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
     * Set isDaily
     *
     * @param string $isDaily
     *
     * @return StoryCorrections
     */
    public function setIsDaily($isDaily)
    {
        $this->is_daily = $isDaily;

        return $this;
    }

    /**
     * Get isDaily
     *
     * @return string
     */
    public function getIsDaily()
    {
        return $this->is_daily;
    }

    /**
     * Set storyRead
     *
     * @param \Entity\Bizj\StoryRead $storyRead
     *
     * @return StoryCorrections
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

