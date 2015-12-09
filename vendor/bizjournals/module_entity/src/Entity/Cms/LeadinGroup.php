<?php

namespace Entity\Cms;

/**
 * LeadinGroup
 */
class LeadinGroup extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $group_id;

    /**
     * @var string
     */
    private $content_type = 'section-front';

    /**
     * @var string
     */
    private $display_name;

    /**
     * @var string
     */
    private $group_class;

    /**
     * @var string
     */
    private $placement;

    /**
     * @var integer
     */
    private $max_instances = 1;

    /**
     * @var boolean
     */
    private $allow_story_items = true;

    /**
     * @var boolean
     */
    private $allow_group_title = true;

    /**
     * @var boolean
     */
    private $allow_group_teaser = true;

    /**
     * @var boolean
     */
    private $allow_curate = true;

    /**
     * @var boolean
     */
    private $allow_auto = true;

    /**
     * @var integer
     */
    private $min_items = 0;

    /**
     * @var integer
     */
    private $max_items = 255;

    /**
     * @var boolean
     */
    private $allow_external_items = true;

    /**
     * @var boolean
     */
    private $allow_gallery_items = true;

    /**
     * @var boolean
     */
    private $allow_video_items = true;

    /**
     * @var boolean
     */
    private $allow_image_upload = true;

    /**
     * @var boolean
     */
    private $allow_kicker = false;

    /**
     * @var boolean
     */
    private $use_short_headline = false;

    /**
     * @var string
     */
    private $default_image_ratio = '4:3';

    /**
     * @var string
     */
    private $first_image_ratio = '4:3';

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LeadinGroupPub;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Publication;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->LeadinGroupPub = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Publication = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set contentType
     *
     * @param string $contentType
     *
     * @return LeadinGroup
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return LeadinGroup
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set groupClass
     *
     * @param string $groupClass
     *
     * @return LeadinGroup
     */
    public function setGroupClass($groupClass)
    {
        $this->group_class = $groupClass;

        return $this;
    }

    /**
     * Get groupClass
     *
     * @return string
     */
    public function getGroupClass()
    {
        return $this->group_class;
    }

    /**
     * Set placement
     *
     * @param string $placement
     *
     * @return LeadinGroup
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return string
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set maxInstances
     *
     * @param integer $maxInstances
     *
     * @return LeadinGroup
     */
    public function setMaxInstances($maxInstances)
    {
        $this->max_instances = $maxInstances;

        return $this;
    }

    /**
     * Get maxInstances
     *
     * @return integer
     */
    public function getMaxInstances()
    {
        return $this->max_instances;
    }

    /**
     * Set allowStoryItems
     *
     * @param boolean $allowStoryItems
     *
     * @return LeadinGroup
     */
    public function setAllowStoryItems($allowStoryItems)
    {
        $this->allow_story_items = $allowStoryItems;

        return $this;
    }

    /**
     * Get allowStoryItems
     *
     * @return boolean
     */
    public function getAllowStoryItems()
    {
        return $this->allow_story_items;
    }

    /**
     * Set allowGroupTitle
     *
     * @param boolean $allowGroupTitle
     *
     * @return LeadinGroup
     */
    public function setAllowGroupTitle($allowGroupTitle)
    {
        $this->allow_group_title = $allowGroupTitle;

        return $this;
    }

    /**
     * Get allowGroupTitle
     *
     * @return boolean
     */
    public function getAllowGroupTitle()
    {
        return $this->allow_group_title;
    }

    /**
     * Set allowGroupTeaser
     *
     * @param boolean $allowGroupTeaser
     *
     * @return LeadinGroup
     */
    public function setAllowGroupTeaser($allowGroupTeaser)
    {
        $this->allow_group_teaser = $allowGroupTeaser;

        return $this;
    }

    /**
     * Get allowGroupTeaser
     *
     * @return boolean
     */
    public function getAllowGroupTeaser()
    {
        return $this->allow_group_teaser;
    }

    /**
     * Set allowCurate
     *
     * @param boolean $allowCurate
     *
     * @return LeadinGroup
     */
    public function setAllowCurate($allowCurate)
    {
        $this->allow_curate = $allowCurate;

        return $this;
    }

    /**
     * Get allowCurate
     *
     * @return boolean
     */
    public function getAllowCurate()
    {
        return $this->allow_curate;
    }

    /**
     * Set allowAuto
     *
     * @param boolean $allowAuto
     *
     * @return LeadinGroup
     */
    public function setAllowAuto($allowAuto)
    {
        $this->allow_auto = $allowAuto;

        return $this;
    }

    /**
     * Get allowAuto
     *
     * @return boolean
     */
    public function getAllowAuto()
    {
        return $this->allow_auto;
    }

    /**
     * Set minItems
     *
     * @param integer $minItems
     *
     * @return LeadinGroup
     */
    public function setMinItems($minItems)
    {
        $this->min_items = $minItems;

        return $this;
    }

    /**
     * Get minItems
     *
     * @return integer
     */
    public function getMinItems()
    {
        return $this->min_items;
    }

    /**
     * Set maxItems
     *
     * @param integer $maxItems
     *
     * @return LeadinGroup
     */
    public function setMaxItems($maxItems)
    {
        $this->max_items = $maxItems;

        return $this;
    }

    /**
     * Get maxItems
     *
     * @return integer
     */
    public function getMaxItems()
    {
        return $this->max_items;
    }

    /**
     * Set allowExternalItems
     *
     * @param boolean $allowExternalItems
     *
     * @return LeadinGroup
     */
    public function setAllowExternalItems($allowExternalItems)
    {
        $this->allow_external_items = $allowExternalItems;

        return $this;
    }

    /**
     * Get allowExternalItems
     *
     * @return boolean
     */
    public function getAllowExternalItems()
    {
        return $this->allow_external_items;
    }

    /**
     * Set allowGalleryItems
     *
     * @param boolean $allowGalleryItems
     *
     * @return LeadinGroup
     */
    public function setAllowGalleryItems($allowGalleryItems)
    {
        $this->allow_gallery_items = $allowGalleryItems;

        return $this;
    }

    /**
     * Get allowGalleryItems
     *
     * @return boolean
     */
    public function getAllowGalleryItems()
    {
        return $this->allow_gallery_items;
    }

    /**
     * Set allowVideoItems
     *
     * @param boolean $allowVideoItems
     *
     * @return LeadinGroup
     */
    public function setAllowVideoItems($allowVideoItems)
    {
        $this->allow_video_items = $allowVideoItems;

        return $this;
    }

    /**
     * Get allowVideoItems
     *
     * @return boolean
     */
    public function getAllowVideoItems()
    {
        return $this->allow_video_items;
    }

    /**
     * Set allowImageUpload
     *
     * @param boolean $allowImageUpload
     *
     * @return LeadinGroup
     */
    public function setAllowImageUpload($allowImageUpload)
    {
        $this->allow_image_upload = $allowImageUpload;

        return $this;
    }

    /**
     * Get allowImageUpload
     *
     * @return boolean
     */
    public function getAllowImageUpload()
    {
        return $this->allow_image_upload;
    }

    /**
     * Set allowKicker
     *
     * @param boolean $allowKicker
     *
     * @return LeadinGroup
     */
    public function setAllowKicker($allowKicker)
    {
        $this->allow_kicker = $allowKicker;

        return $this;
    }

    /**
     * Get allowKicker
     *
     * @return boolean
     */
    public function getAllowKicker()
    {
        return $this->allow_kicker;
    }

    /**
     * Set useShortHeadline
     *
     * @param boolean $useShortHeadline
     *
     * @return LeadinGroup
     */
    public function setUseShortHeadline($useShortHeadline)
    {
        $this->use_short_headline = $useShortHeadline;

        return $this;
    }

    /**
     * Get useShortHeadline
     *
     * @return boolean
     */
    public function getUseShortHeadline()
    {
        return $this->use_short_headline;
    }

    /**
     * Set defaultImageRatio
     *
     * @param string $defaultImageRatio
     *
     * @return LeadinGroup
     */
    public function setDefaultImageRatio($defaultImageRatio)
    {
        $this->default_image_ratio = $defaultImageRatio;

        return $this;
    }

    /**
     * Get defaultImageRatio
     *
     * @return string
     */
    public function getDefaultImageRatio()
    {
        return $this->default_image_ratio;
    }

    /**
     * Set firstImageRatio
     *
     * @param string $firstImageRatio
     *
     * @return LeadinGroup
     */
    public function setFirstImageRatio($firstImageRatio)
    {
        $this->first_image_ratio = $firstImageRatio;

        return $this;
    }

    /**
     * Get firstImageRatio
     *
     * @return string
     */
    public function getFirstImageRatio()
    {
        return $this->first_image_ratio;
    }

    /**
     * Add leadinGroupPub
     *
     * @param \Entity\Cms\LeadinGroupPub $leadinGroupPub
     *
     * @return LeadinGroup
     */
    public function addLeadinGroupPub(\Entity\Cms\LeadinGroupPub $leadinGroupPub)
    {
        $this->LeadinGroupPub[] = $leadinGroupPub;

        return $this;
    }

    /**
     * Remove leadinGroupPub
     *
     * @param \Entity\Cms\LeadinGroupPub $leadinGroupPub
     */
    public function removeLeadinGroupPub(\Entity\Cms\LeadinGroupPub $leadinGroupPub)
    {
        $this->LeadinGroupPub->removeElement($leadinGroupPub);
    }

    /**
     * Get leadinGroupPub
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeadinGroupPub()
    {
        return $this->LeadinGroupPub;
    }

    /**
     * Add publication
     *
     * @param \Entity\Cms\Publication $publication
     *
     * @return LeadinGroup
     */
    public function addPublication(\Entity\Cms\Publication $publication)
    {
        $this->Publication[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \Entity\Cms\Publication $publication
     */
    public function removePublication(\Entity\Cms\Publication $publication)
    {
        $this->Publication->removeElement($publication);
    }

    /**
     * Get publication
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}

