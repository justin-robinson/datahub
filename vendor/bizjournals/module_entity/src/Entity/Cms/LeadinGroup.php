<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

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
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set content_type
     *
     * @param string $contentType
     * @return LeadinGroup
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get content_type
     *
     * @return string 
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set display_name
     *
     * @param string $displayName
     * @return LeadinGroup
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set group_class
     *
     * @param string $groupClass
     * @return LeadinGroup
     */
    public function setGroupClass($groupClass)
    {
        $this->group_class = $groupClass;

        return $this;
    }

    /**
     * Get group_class
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
     * Set max_instances
     *
     * @param integer $maxInstances
     * @return LeadinGroup
     */
    public function setMaxInstances($maxInstances)
    {
        $this->max_instances = $maxInstances;

        return $this;
    }

    /**
     * Get max_instances
     *
     * @return integer 
     */
    public function getMaxInstances()
    {
        return $this->max_instances;
    }

    /**
     * Set allow_story_items
     *
     * @param boolean $allowStoryItems
     * @return LeadinGroup
     */
    public function setAllowStoryItems($allowStoryItems)
    {
        $this->allow_story_items = $allowStoryItems;

        return $this;
    }

    /**
     * Get allow_story_items
     *
     * @return boolean 
     */
    public function getAllowStoryItems()
    {
        return $this->allow_story_items;
    }

    /**
     * Set allow_group_title
     *
     * @param boolean $allowGroupTitle
     * @return LeadinGroup
     */
    public function setAllowGroupTitle($allowGroupTitle)
    {
        $this->allow_group_title = $allowGroupTitle;

        return $this;
    }

    /**
     * Get allow_group_title
     *
     * @return boolean 
     */
    public function getAllowGroupTitle()
    {
        return $this->allow_group_title;
    }

    /**
     * Set allow_group_teaser
     *
     * @param boolean $allowGroupTeaser
     * @return LeadinGroup
     */
    public function setAllowGroupTeaser($allowGroupTeaser)
    {
        $this->allow_group_teaser = $allowGroupTeaser;

        return $this;
    }

    /**
     * Get allow_group_teaser
     *
     * @return boolean 
     */
    public function getAllowGroupTeaser()
    {
        return $this->allow_group_teaser;
    }

    /**
     * Set allow_curate
     *
     * @param boolean $allowCurate
     * @return LeadinGroup
     */
    public function setAllowCurate($allowCurate)
    {
        $this->allow_curate = $allowCurate;

        return $this;
    }

    /**
     * Get allow_curate
     *
     * @return boolean 
     */
    public function getAllowCurate()
    {
        return $this->allow_curate;
    }

    /**
     * Set allow_auto
     *
     * @param boolean $allowAuto
     * @return LeadinGroup
     */
    public function setAllowAuto($allowAuto)
    {
        $this->allow_auto = $allowAuto;

        return $this;
    }

    /**
     * Get allow_auto
     *
     * @return boolean 
     */
    public function getAllowAuto()
    {
        return $this->allow_auto;
    }

    /**
     * Set min_items
     *
     * @param integer $minItems
     * @return LeadinGroup
     */
    public function setMinItems($minItems)
    {
        $this->min_items = $minItems;

        return $this;
    }

    /**
     * Get min_items
     *
     * @return integer 
     */
    public function getMinItems()
    {
        return $this->min_items;
    }

    /**
     * Set max_items
     *
     * @param integer $maxItems
     * @return LeadinGroup
     */
    public function setMaxItems($maxItems)
    {
        $this->max_items = $maxItems;

        return $this;
    }

    /**
     * Get max_items
     *
     * @return integer 
     */
    public function getMaxItems()
    {
        return $this->max_items;
    }

    /**
     * Set allow_external_items
     *
     * @param boolean $allowExternalItems
     * @return LeadinGroup
     */
    public function setAllowExternalItems($allowExternalItems)
    {
        $this->allow_external_items = $allowExternalItems;

        return $this;
    }

    /**
     * Get allow_external_items
     *
     * @return boolean 
     */
    public function getAllowExternalItems()
    {
        return $this->allow_external_items;
    }

    /**
     * Set allow_gallery_items
     *
     * @param boolean $allowGalleryItems
     * @return LeadinGroup
     */
    public function setAllowGalleryItems($allowGalleryItems)
    {
        $this->allow_gallery_items = $allowGalleryItems;

        return $this;
    }

    /**
     * Get allow_gallery_items
     *
     * @return boolean 
     */
    public function getAllowGalleryItems()
    {
        return $this->allow_gallery_items;
    }

    /**
     * Set allow_video_items
     *
     * @param boolean $allowVideoItems
     * @return LeadinGroup
     */
    public function setAllowVideoItems($allowVideoItems)
    {
        $this->allow_video_items = $allowVideoItems;

        return $this;
    }

    /**
     * Get allow_video_items
     *
     * @return boolean 
     */
    public function getAllowVideoItems()
    {
        return $this->allow_video_items;
    }

    /**
     * Set allow_image_upload
     *
     * @param boolean $allowImageUpload
     * @return LeadinGroup
     */
    public function setAllowImageUpload($allowImageUpload)
    {
        $this->allow_image_upload = $allowImageUpload;

        return $this;
    }

    /**
     * Get allow_image_upload
     *
     * @return boolean 
     */
    public function getAllowImageUpload()
    {
        return $this->allow_image_upload;
    }

    /**
     * Set allow_kicker
     *
     * @param boolean $allowKicker
     * @return LeadinGroup
     */
    public function setAllowKicker($allowKicker)
    {
        $this->allow_kicker = $allowKicker;

        return $this;
    }

    /**
     * Get allow_kicker
     *
     * @return boolean 
     */
    public function getAllowKicker()
    {
        return $this->allow_kicker;
    }

    /**
     * Set use_short_headline
     *
     * @param boolean $useShortHeadline
     * @return LeadinGroup
     */
    public function setUseShortHeadline($useShortHeadline)
    {
        $this->use_short_headline = $useShortHeadline;

        return $this;
    }

    /**
     * Get use_short_headline
     *
     * @return boolean 
     */
    public function getUseShortHeadline()
    {
        return $this->use_short_headline;
    }

    /**
     * Set default_image_ratio
     *
     * @param string $defaultImageRatio
     * @return LeadinGroup
     */
    public function setDefaultImageRatio($defaultImageRatio)
    {
        $this->default_image_ratio = $defaultImageRatio;

        return $this;
    }

    /**
     * Get default_image_ratio
     *
     * @return string 
     */
    public function getDefaultImageRatio()
    {
        return $this->default_image_ratio;
    }

    /**
     * Set first_image_ratio
     *
     * @param string $firstImageRatio
     * @return LeadinGroup
     */
    public function setFirstImageRatio($firstImageRatio)
    {
        $this->first_image_ratio = $firstImageRatio;

        return $this;
    }

    /**
     * Get first_image_ratio
     *
     * @return string 
     */
    public function getFirstImageRatio()
    {
        return $this->first_image_ratio;
    }

    /**
     * Add LeadinGroupPub
     *
     * @param \Entity\Cms\LeadinGroupPub $leadinGroupPub
     * @return LeadinGroup
     */
    public function addLeadinGroupPub(\Entity\Cms\LeadinGroupPub $leadinGroupPub)
    {
        $this->LeadinGroupPub[] = $leadinGroupPub;

        return $this;
    }

    /**
     * Remove LeadinGroupPub
     *
     * @param \Entity\Cms\LeadinGroupPub $leadinGroupPub
     */
    public function removeLeadinGroupPub(\Entity\Cms\LeadinGroupPub $leadinGroupPub)
    {
        $this->LeadinGroupPub->removeElement($leadinGroupPub);
    }

    /**
     * Get LeadinGroupPub
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeadinGroupPub()
    {
        return $this->LeadinGroupPub;
    }

    /**
     * Add Publication
     *
     * @param \Entity\Cms\Publication $publication
     * @return LeadinGroup
     */
    public function addPublication(\Entity\Cms\Publication $publication)
    {
        $this->Publication[] = $publication;

        return $this;
    }

    /**
     * Remove Publication
     *
     * @param \Entity\Cms\Publication $publication
     */
    public function removePublication(\Entity\Cms\Publication $publication)
    {
        $this->Publication->removeElement($publication);
    }

    /**
     * Get Publication
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}
