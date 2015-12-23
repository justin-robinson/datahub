<?php

namespace Entity\Bizj;

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
     * Get specialCatId
     *
     * @return integer
     */
    public function getSpecialCatId()
    {
        return $this->special_cat_id;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return KrangSpecialCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set sponsorName
     *
     * @param string $sponsorName
     *
     * @return KrangSpecialCategory
     */
    public function setSponsorName($sponsorName)
    {
        $this->sponsor_name = $sponsorName;

        return $this;
    }

    /**
     * Get sponsorName
     *
     * @return string
     */
    public function getSponsorName()
    {
        return $this->sponsor_name;
    }

    /**
     * Set contentLabel
     *
     * @param string $contentLabel
     *
     * @return KrangSpecialCategory
     */
    public function setContentLabel($contentLabel)
    {
        $this->content_label = $contentLabel;

        return $this;
    }

    /**
     * Get contentLabel
     *
     * @return string
     */
    public function getContentLabel()
    {
        return $this->content_label;
    }

    /**
     * Set marketCode
     *
     * @param string $marketCode
     *
     * @return KrangSpecialCategory
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get marketCode
     *
     * @return string
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set krangPageType
     *
     * @param string $krangPageType
     *
     * @return KrangSpecialCategory
     */
    public function setKrangPageType($krangPageType)
    {
        $this->krang_page_type = $krangPageType;

        return $this;
    }

    /**
     * Get krangPageType
     *
     * @return string
     */
    public function getKrangPageType()
    {
        return $this->krang_page_type;
    }

    /**
     * Set krangCategory
     *
     * @param string $krangCategory
     *
     * @return KrangSpecialCategory
     */
    public function setKrangCategory($krangCategory)
    {
        $this->krang_category = $krangCategory;

        return $this;
    }

    /**
     * Get krangCategory
     *
     * @return string
     */
    public function getKrangCategory()
    {
        return $this->krang_category;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return KrangSpecialCategory
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
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
     *
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
     *
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
     * Set adtagSpf
     *
     * @param integer $adtagSpf
     *
     * @return KrangSpecialCategory
     */
    public function setAdtagSpf($adtagSpf)
    {
        $this->adtag_spf = $adtagSpf;

        return $this;
    }

    /**
     * Get adtagSpf
     *
     * @return integer
     */
    public function getAdtagSpf()
    {
        return $this->adtag_spf;
    }

    /**
     * Set blogExtraheader
     *
     * @param string $blogExtraheader
     *
     * @return KrangSpecialCategory
     */
    public function setBlogExtraheader($blogExtraheader)
    {
        $this->blog_extraheader = $blogExtraheader;

        return $this;
    }

    /**
     * Get blogExtraheader
     *
     * @return string
     */
    public function getBlogExtraheader()
    {
        return $this->blog_extraheader;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return KrangSpecialCategory
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return KrangSpecialCategory
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set modifiedBy
     *
     * @param string $modifiedBy
     *
     * @return KrangSpecialCategory
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modified_by = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return KrangSpecialCategory
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return KrangSpecialCategory
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return KrangSpecialCategory
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}

