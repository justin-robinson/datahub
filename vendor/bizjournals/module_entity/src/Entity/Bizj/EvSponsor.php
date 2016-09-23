<?php

namespace Entity\Bizj;

/**
 * EvSponsor
 */
class EvSponsor extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $sponsor_id;

    /**
     * @var string
     */
    private $sponsor_name;

    /**
     * @var integer
     */
    private $tier_id;

    /**
     * @var integer
     */
    private $image_id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $industry_id;

    /**
     * @var string
     */
    private $image_type = 'jpg';

    /**
     * @var string
     */
    private $image_link;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var \Entity\Bizj\EvSponsorTier
     */
    private $Tier;


    /**
     * Get sponsorId
     *
     * @return integer
     */
    public function getSponsorId()
    {
        return $this->sponsor_id;
    }

    /**
     * Set sponsorName
     *
     * @param string $sponsorName
     *
     * @return EvSponsor
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
     * Set tierId
     *
     * @param integer $tierId
     *
     * @return EvSponsor
     */
    public function setTierId($tierId)
    {
        $this->tier_id = $tierId;

        return $this;
    }

    /**
     * Get tierId
     *
     * @return integer
     */
    public function getTierId()
    {
        return $this->tier_id;
    }

    /**
     * Set imageId
     *
     * @param integer $imageId
     *
     * @return EvSponsor
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
     * Set description
     *
     * @param string $description
     *
     * @return EvSponsor
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set industryId
     *
     * @param integer $industryId
     *
     * @return EvSponsor
     */
    public function setIndustryId($industryId)
    {
        $this->industry_id = $industryId;

        return $this;
    }

    /**
     * Get industryId
     *
     * @return integer
     */
    public function getIndustryId()
    {
        return $this->industry_id;
    }

    /**
     * Set imageType
     *
     * @param string $imageType
     *
     * @return EvSponsor
     */
    public function setImageType($imageType)
    {
        $this->image_type = $imageType;

        return $this;
    }

    /**
     * Get imageType
     *
     * @return string
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Set imageLink
     *
     * @param string $imageLink
     *
     * @return EvSponsor
     */
    public function setImageLink($imageLink)
    {
        $this->image_link = $imageLink;

        return $this;
    }

    /**
     * Get imageLink
     *
     * @return string
     */
    public function getImageLink()
    {
        return $this->image_link;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return EvSponsor
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set tier
     *
     * @param \Entity\Bizj\EvSponsorTier $tier
     *
     * @return EvSponsor
     */
    public function setTier(\Entity\Bizj\EvSponsorTier $tier = null)
    {
        $this->Tier = $tier;

        return $this;
    }

    /**
     * Get tier
     *
     * @return \Entity\Bizj\EvSponsorTier
     */
    public function getTier()
    {
        return $this->Tier;
    }
}

