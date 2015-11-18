<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * KrangSpecialCategory
 */
class KrangSpecialCategory extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $special_cat_id;

    /**
     * @var string
     */
    private $category_name;

    /**
     * @var string
     */
    private $sponsor_name;

    /**
     * @var string
     */
    private $content_label = 'Sponsor Content';

    /**
     * @var string
     */
    private $market_code;

    /**
     * @var string
     */
    private $krang_page_type;

    /**
     * @var string
     */
    private $krang_category;

    /**
     * @var boolean
     */
    private $is_active = '1';

    /**
     * @var string
     */
    private $skin;

    /**
     * @var string
     */
    private $extraheader;

    /**
     * @var integer
     */
    private $adtag_spf;

    /**
     * @var string
     */
    private $blog_extraheader;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $modified_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;


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
     * Set category_name
     *
     * @param string $categoryName
     * @return KrangSpecialCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get category_name
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set sponsor_name
     *
     * @param string $sponsorName
     * @return KrangSpecialCategory
     */
    public function setSponsorName($sponsorName)
    {
        $this->sponsor_name = $sponsorName;

        return $this;
    }

    /**
     * Get sponsor_name
     *
     * @return string 
     */
    public function getSponsorName()
    {
        return $this->sponsor_name;
    }

    /**
     * Set content_label
     *
     * @param string $contentLabel
     * @return KrangSpecialCategory
     */
    public function setContentLabel($contentLabel)
    {
        $this->content_label = $contentLabel;

        return $this;
    }

    /**
     * Get content_label
     *
     * @return string 
     */
    public function getContentLabel()
    {
        return $this->content_label;
    }

    /**
     * Set market_code
     *
     * @param string $marketCode
     * @return KrangSpecialCategory
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set krang_page_type
     *
     * @param string $krangPageType
     * @return KrangSpecialCategory
     */
    public function setKrangPageType($krangPageType)
    {
        $this->krang_page_type = $krangPageType;

        return $this;
    }

    /**
     * Get krang_page_type
     *
     * @return string 
     */
    public function getKrangPageType()
    {
        return $this->krang_page_type;
    }

    /**
     * Set krang_category
     *
     * @param string $krangCategory
     * @return KrangSpecialCategory
     */
    public function setKrangCategory($krangCategory)
    {
        $this->krang_category = $krangCategory;

        return $this;
    }

    /**
     * Get krang_category
     *
     * @return string 
     */
    public function getKrangCategory()
    {
        return $this->krang_category;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return KrangSpecialCategory
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set skin
     *
     * @param string $skin
     * @return KrangSpecialCategory
     */
    public function setSkin($skin)
    {
        $this->skin = $skin;

        return $this;
    }

    /**
     * Get skin
     *
     * @return string 
     */
    public function getSkin()
    {
        return $this->skin;
    }

    /**
     * Set extraheader
     *
     * @param string $extraheader
     * @return KrangSpecialCategory
     */
    public function setExtraheader($extraheader)
    {
        $this->extraheader = $extraheader;

        return $this;
    }

    /**
     * Get extraheader
     *
     * @return string 
     */
    public function getExtraheader()
    {
        return $this->extraheader;
    }

    /**
     * Set adtag_spf
     *
     * @param integer $adtagSpf
     * @return KrangSpecialCategory
     */
    public function setAdtagSpf($adtagSpf)
    {
        $this->adtag_spf = $adtagSpf;

        return $this;
    }

    /**
     * Get adtag_spf
     *
     * @return integer 
     */
    public function getAdtagSpf()
    {
        return $this->adtag_spf;
    }

    /**
     * Set blog_extraheader
     *
     * @param string $blogExtraheader
     * @return KrangSpecialCategory
     */
    public function setBlogExtraheader($blogExtraheader)
    {
        $this->blog_extraheader = $blogExtraheader;

        return $this;
    }

    /**
     * Get blog_extraheader
     *
     * @return string 
     */
    public function getBlogExtraheader()
    {
        return $this->blog_extraheader;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return KrangSpecialCategory
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return KrangSpecialCategory
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set modified_by
     *
     * @param string $modifiedBy
     * @return KrangSpecialCategory
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modified_by = $modifiedBy;

        return $this;
    }

    /**
     * Get modified_by
     *
     * @return string 
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return KrangSpecialCategory
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return KrangSpecialCategory
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return KrangSpecialCategory
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}
