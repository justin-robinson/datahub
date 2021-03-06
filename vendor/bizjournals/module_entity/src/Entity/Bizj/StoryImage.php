<?php

namespace Entity\Bizj;

/**
 * StoryImage
 */
class StoryImage extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $image_id;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var integer
     */
    private $major_rev = 0;

    /**
     * @var \DateTime
     */
    private $rev_time;

    /**
     * @var string
     */
    private $caption;

    /**
     * @var string
     */
    private $media_producer;

    /**
     * @var string
     */
    private $image_data;

    /**
     * @var integer
     */
    private $width = 0;

    /**
     * @var integer
     */
    private $height = 0;

    /**
     * @var string
     */
    private $size_hint;

    /**
     * @var integer
     */
    private $display_order = 0;

    /**
     * @var \Entity\Bizj\StoryRead
     */
    private $StoryRead;


    /**
     * Set imageId
     *
     * @param integer $imageId
     *
     * @return StoryImage
     */
    public function setImageId($imageId)
    {
        $this->image_id = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return integer
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StoryImage
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
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return StoryImage
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
     * Set majorRev
     *
     * @param integer $majorRev
     *
     * @return StoryImage
     */
    public function setMajorRev($majorRev)
    {
        $this->major_rev = $majorRev;

        return $this;
    }

    /**
     * Get majorRev
     *
     * @return integer
     */
    public function getMajorRev()
    {
        return $this->major_rev;
    }

    /**
     * Set revTime
     *
     * @param \DateTime $revTime
     *
     * @return StoryImage
     */
    public function setRevTime($revTime)
    {
        $this->rev_time = $revTime;

        return $this;
    }

    /**
     * Get revTime
     *
     * @return \DateTime
     */
    public function getRevTime()
    {
        return $this->rev_time;
    }

    /**
     * Set caption
     *
     * @param string $caption
     *
     * @return StoryImage
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set mediaProducer
     *
     * @param string $mediaProducer
     *
     * @return StoryImage
     */
    public function setMediaProducer($mediaProducer)
    {
        $this->media_producer = $mediaProducer;

        return $this;
    }

    /**
     * Get mediaProducer
     *
     * @return string
     */
    public function getMediaProducer()
    {
        return $this->media_producer;
    }

    /**
     * Set imageData
     *
     * @param string $imageData
     *
     * @return StoryImage
     */
    public function setImageData($imageData)
    {
        $this->image_data = $imageData;

        return $this;
    }

    /**
     * Get imageData
     *
     * @return string
     */
    public function getImageData()
    {
        return $this->image_data;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return StoryImage
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return StoryImage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set sizeHint
     *
     * @param string $sizeHint
     *
     * @return StoryImage
     */
    public function setSizeHint($sizeHint)
    {
        $this->size_hint = $sizeHint;

        return $this;
    }

    /**
     * Get sizeHint
     *
     * @return string
     */
    public function getSizeHint()
    {
        return $this->size_hint;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     *
     * @return StoryImage
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->display_order = $displayOrder;

        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer
     */
    public function getDisplayOrder()
    {
        return $this->display_order;
    }

    /**
     * Set storyRead
     *
     * @param \Entity\Bizj\StoryRead $storyRead
     *
     * @return StoryImage
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

