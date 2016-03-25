<?php

namespace Entity\Bizj;

/**
 * Nomination
 */
class Nomination extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $nomination_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $subheader;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var boolean
     */
    private $active = true;

    /**
     * @var boolean
     */
    private $archived = false;

    /**
     * @var boolean
     */
    private $invitation_only = false;

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
    private $short_description;

    /**
     * @var string
     */
    private $long_description;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $media_url;

    /**
     * @var string
     */
    private $contact_email_list;

    /**
     * @var integer
     */
    private $preview_for_id;

    /**
     * @var integer
     */
    private $sponsor_media_id;

    /**
     * @var string
     */
    private $sponsor_media_url;

    /**
     * @var string
     */
    private $sponsor_name;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var string
     */
    private $external_url;

    /**
     * @var string
     */
    private $updated_by;

    /**
     * @var string
     */
    private $nomination_type = 'null';

    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var string
     */
    private $parameters;

    /**
     * @var string
     */
    private $sponsors;

    /**
     * @var boolean
     */
    private $is_brand_extension = false;

    /**
     * @var integer
     */
    private $brand_extension_year;

    /**
     * @var integer
     */
    private $brand_id;

    /**
     * @var boolean
     */
    private $has_locked_form = false;

    /**
     * @var \DateTime
     */
    private $sponsor_display_start_date;

    /**
     * @var \DateTime
     */
    private $sponsor_display_end_date;

    /**
     * @var \DateTime
     */
    private $winners_visible_at;

    /**
     * @var integer
     */
    private $ord = 65535;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;


    /**
     * Get nominationId
     *
     * @return integer
     */
    public function getNominationId()
    {
        return $this->nomination_id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Nomination
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subheader
     *
     * @param string $subheader
     *
     * @return Nomination
     */
    public function setSubheader($subheader)
    {
        $this->subheader = $subheader;

        return $this;
    }

    /**
     * Get subheader
     *
     * @return string
     */
    public function getSubheader()
    {
        return $this->subheader;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return Nomination
     */
    public function setMarketId($marketId)
    {
        $this->market_id = $marketId;

        return $this;
    }

    /**
     * Get marketId
     *
     * @return integer
     */
    public function getMarketId()
    {
        return $this->market_id;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Nomination
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Nomination
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set invitationOnly
     *
     * @param boolean $invitationOnly
     *
     * @return Nomination
     */
    public function setInvitationOnly($invitationOnly)
    {
        $this->invitation_only = $invitationOnly;

        return $this;
    }

    /**
     * Get invitationOnly
     *
     * @return boolean
     */
    public function getInvitationOnly()
    {
        return $this->invitation_only;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Nomination
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
     * @return Nomination
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
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Nomination
     */
    public function setShortDescription($shortDescription)
    {
        $this->short_description = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->short_description;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     *
     * @return Nomination
     */
    public function setLongDescription($longDescription)
    {
        $this->long_description = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string
     */
    public function getLongDescription()
    {
        return $this->long_description;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return Nomination
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
    }

    /**
     * Get mediaId
     *
     * @return integer
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set mediaUrl
     *
     * @param string $mediaUrl
     *
     * @return Nomination
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->media_url = $mediaUrl;

        return $this;
    }

    /**
     * Get mediaUrl
     *
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->media_url;
    }

    /**
     * Set contactEmailList
     *
     * @param string $contactEmailList
     *
     * @return Nomination
     */
    public function setContactEmailList($contactEmailList)
    {
        $this->contact_email_list = $contactEmailList;

        return $this;
    }

    /**
     * Get contactEmailList
     *
     * @return string
     */
    public function getContactEmailList()
    {
        return $this->contact_email_list;
    }

    /**
     * Set previewForId
     *
     * @param integer $previewForId
     *
     * @return Nomination
     */
    public function setPreviewForId($previewForId)
    {
        $this->preview_for_id = $previewForId;

        return $this;
    }

    /**
     * Get previewForId
     *
     * @return integer
     */
    public function getPreviewForId()
    {
        return $this->preview_for_id;
    }

    /**
     * Set sponsorMediaId
     *
     * @param integer $sponsorMediaId
     *
     * @return Nomination
     */
    public function setSponsorMediaId($sponsorMediaId)
    {
        $this->sponsor_media_id = $sponsorMediaId;

        return $this;
    }

    /**
     * Get sponsorMediaId
     *
     * @return integer
     */
    public function getSponsorMediaId()
    {
        return $this->sponsor_media_id;
    }

    /**
     * Set sponsorMediaUrl
     *
     * @param string $sponsorMediaUrl
     *
     * @return Nomination
     */
    public function setSponsorMediaUrl($sponsorMediaUrl)
    {
        $this->sponsor_media_url = $sponsorMediaUrl;

        return $this;
    }

    /**
     * Get sponsorMediaUrl
     *
     * @return string
     */
    public function getSponsorMediaUrl()
    {
        return $this->sponsor_media_url;
    }

    /**
     * Set sponsorName
     *
     * @param string $sponsorName
     *
     * @return Nomination
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Nomination
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
     * @return Nomination
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
     * Set externalUrl
     *
     * @param string $externalUrl
     *
     * @return Nomination
     */
    public function setExternalUrl($externalUrl)
    {
        $this->external_url = $externalUrl;

        return $this;
    }

    /**
     * Get externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->external_url;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return Nomination
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set nominationType
     *
     * @param string $nominationType
     *
     * @return Nomination
     */
    public function setNominationType($nominationType)
    {
        $this->nomination_type = $nominationType;

        return $this;
    }

    /**
     * Get nominationType
     *
     * @return string
     */
    public function getNominationType()
    {
        return $this->nomination_type;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return Nomination
     */
    public function setEventId($eventId)
    {
        $this->event_id = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set parameters
     *
     * @param string $parameters
     *
     * @return Nomination
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Get parameters
     *
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set sponsors
     *
     * @param string $sponsors
     *
     * @return Nomination
     */
    public function setSponsors($sponsors)
    {
        $this->sponsors = $sponsors;

        return $this;
    }

    /**
     * Get sponsors
     *
     * @return string
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }

    /**
     * Set isBrandExtension
     *
     * @param boolean $isBrandExtension
     *
     * @return Nomination
     */
    public function setIsBrandExtension($isBrandExtension)
    {
        $this->is_brand_extension = $isBrandExtension;

        return $this;
    }

    /**
     * Get isBrandExtension
     *
     * @return boolean
     */
    public function getIsBrandExtension()
    {
        return $this->is_brand_extension;
    }

    /**
     * Set brandExtensionYear
     *
     * @param integer $brandExtensionYear
     *
     * @return Nomination
     */
    public function setBrandExtensionYear($brandExtensionYear)
    {
        $this->brand_extension_year = $brandExtensionYear;

        return $this;
    }

    /**
     * Get brandExtensionYear
     *
     * @return integer
     */
    public function getBrandExtensionYear()
    {
        return $this->brand_extension_year;
    }

    /**
     * Set brandId
     *
     * @param integer $brandId
     *
     * @return Nomination
     */
    public function setBrandId($brandId)
    {
        $this->brand_id = $brandId;

        return $this;
    }

    /**
     * Get brandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set hasLockedForm
     *
     * @param boolean $hasLockedForm
     *
     * @return Nomination
     */
    public function setHasLockedForm($hasLockedForm)
    {
        $this->has_locked_form = $hasLockedForm;

        return $this;
    }

    /**
     * Get hasLockedForm
     *
     * @return boolean
     */
    public function getHasLockedForm()
    {
        return $this->has_locked_form;
    }

    /**
     * Set sponsorDisplayStartDate
     *
     * @param \DateTime $sponsorDisplayStartDate
     *
     * @return Nomination
     */
    public function setSponsorDisplayStartDate($sponsorDisplayStartDate)
    {
        $this->sponsor_display_start_date = $sponsorDisplayStartDate;

        return $this;
    }

    /**
     * Get sponsorDisplayStartDate
     *
     * @return \DateTime
     */
    public function getSponsorDisplayStartDate()
    {
        return $this->sponsor_display_start_date;
    }

    /**
     * Set sponsorDisplayEndDate
     *
     * @param \DateTime $sponsorDisplayEndDate
     *
     * @return Nomination
     */
    public function setSponsorDisplayEndDate($sponsorDisplayEndDate)
    {
        $this->sponsor_display_end_date = $sponsorDisplayEndDate;

        return $this;
    }

    /**
     * Get sponsorDisplayEndDate
     *
     * @return \DateTime
     */
    public function getSponsorDisplayEndDate()
    {
        return $this->sponsor_display_end_date;
    }

    /**
     * Set winnersVisibleAt
     *
     * @param \DateTime $winnersVisibleAt
     *
     * @return Nomination
     */
    public function setWinnersVisibleAt($winnersVisibleAt)
    {
        $this->winners_visible_at = $winnersVisibleAt;

        return $this;
    }

    /**
     * Get winnersVisibleAt
     *
     * @return \DateTime
     */
    public function getWinnersVisibleAt()
    {
        return $this->winners_visible_at;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return Nomination
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
     * Set market
     *
     * @param \Entity\Bizj\Market $market
     *
     * @return Nomination
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Entity\Bizj\Market
     */
    public function getMarket()
    {
        return $this->Market;
    }
}

