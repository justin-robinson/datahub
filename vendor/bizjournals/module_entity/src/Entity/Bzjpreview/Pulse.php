<?php

namespace Entity\Bzjpreview;

/**
 * Pulse
 */
class Pulse extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var string
     */
    private $pulse_type = 'poll';

    /**
     * @var integer
     */
    private $primary_market_id;

    /**
     * @var string
     */
    private $headline;

    /**
     * @var string
     */
    private $short_headline;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $start_time;

    /**
     * @var \DateTime
     */
    private $end_time;

    /**
     * @var boolean
     */
    private $is_evergreen = false;

    /**
     * @var boolean
     */
    private $is_featured = false;

    /**
     * @var boolean
     */
    private $is_national = false;

    /**
     * @var boolean
     */
    private $has_sponsor = false;

    /**
     * @var boolean
     */
    private $allow_comments = true;

    /**
     * @var boolean
     */
    private $display_results = true;

    /**
     * @var string
     */
    private $meta_title;

    /**
     * @var string
     */
    private $meta_description;

    /**
     * @var integer
     */
    private $estimated_response_count;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Crossrefs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Media;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Markets;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LeadinGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Crossrefs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Markets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->LeadinGroups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return Pulse
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulseId
     *
     * @return integer
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set pulseType
     *
     * @param string $pulseType
     *
     * @return Pulse
     */
    public function setPulseType($pulseType)
    {
        $this->pulse_type = $pulseType;

        return $this;
    }

    /**
     * Get pulseType
     *
     * @return string
     */
    public function getPulseType()
    {
        return $this->pulse_type;
    }

    /**
     * Set primaryMarketId
     *
     * @param integer $primaryMarketId
     *
     * @return Pulse
     */
    public function setPrimaryMarketId($primaryMarketId)
    {
        $this->primary_market_id = $primaryMarketId;

        return $this;
    }

    /**
     * Get primaryMarketId
     *
     * @return integer
     */
    public function getPrimaryMarketId()
    {
        return $this->primary_market_id;
    }

    /**
     * Set headline
     *
     * @param string $headline
     *
     * @return Pulse
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set shortHeadline
     *
     * @param string $shortHeadline
     *
     * @return Pulse
     */
    public function setShortHeadline($shortHeadline)
    {
        $this->short_headline = $shortHeadline;

        return $this;
    }

    /**
     * Get shortHeadline
     *
     * @return string
     */
    public function getShortHeadline()
    {
        return $this->short_headline;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pulse
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
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Pulse
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Pulse
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set isEvergreen
     *
     * @param boolean $isEvergreen
     *
     * @return Pulse
     */
    public function setIsEvergreen($isEvergreen)
    {
        $this->is_evergreen = $isEvergreen;

        return $this;
    }

    /**
     * Get isEvergreen
     *
     * @return boolean
     */
    public function getIsEvergreen()
    {
        return $this->is_evergreen;
    }

    /**
     * Set isFeatured
     *
     * @param boolean $isFeatured
     *
     * @return Pulse
     */
    public function setIsFeatured($isFeatured)
    {
        $this->is_featured = $isFeatured;

        return $this;
    }

    /**
     * Get isFeatured
     *
     * @return boolean
     */
    public function getIsFeatured()
    {
        return $this->is_featured;
    }

    /**
     * Set isNational
     *
     * @param boolean $isNational
     *
     * @return Pulse
     */
    public function setIsNational($isNational)
    {
        $this->is_national = $isNational;

        return $this;
    }

    /**
     * Get isNational
     *
     * @return boolean
     */
    public function getIsNational()
    {
        return $this->is_national;
    }

    /**
     * Set hasSponsor
     *
     * @param boolean $hasSponsor
     *
     * @return Pulse
     */
    public function setHasSponsor($hasSponsor)
    {
        $this->has_sponsor = $hasSponsor;

        return $this;
    }

    /**
     * Get hasSponsor
     *
     * @return boolean
     */
    public function getHasSponsor()
    {
        return $this->has_sponsor;
    }

    /**
     * Set allowComments
     *
     * @param boolean $allowComments
     *
     * @return Pulse
     */
    public function setAllowComments($allowComments)
    {
        $this->allow_comments = $allowComments;

        return $this;
    }

    /**
     * Get allowComments
     *
     * @return boolean
     */
    public function getAllowComments()
    {
        return $this->allow_comments;
    }

    /**
     * Set displayResults
     *
     * @param boolean $displayResults
     *
     * @return Pulse
     */
    public function setDisplayResults($displayResults)
    {
        $this->display_results = $displayResults;

        return $this;
    }

    /**
     * Get displayResults
     *
     * @return boolean
     */
    public function getDisplayResults()
    {
        return $this->display_results;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return Pulse
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return Pulse
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set estimatedResponseCount
     *
     * @param integer $estimatedResponseCount
     *
     * @return Pulse
     */
    public function setEstimatedResponseCount($estimatedResponseCount)
    {
        $this->estimated_response_count = $estimatedResponseCount;

        return $this;
    }

    /**
     * Get estimatedResponseCount
     *
     * @return integer
     */
    public function getEstimatedResponseCount()
    {
        return $this->estimated_response_count;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Pulse
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
     * @return Pulse
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
     * @return Pulse
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

    /**
     * Add crossref
     *
     * @param \Entity\Bzjpreview\PulseCrossref $crossref
     *
     * @return Pulse
     */
    public function addCrossref(\Entity\Bzjpreview\PulseCrossref $crossref)
    {
        $this->Crossrefs[] = $crossref;

        return $this;
    }

    /**
     * Remove crossref
     *
     * @param \Entity\Bzjpreview\PulseCrossref $crossref
     */
    public function removeCrossref(\Entity\Bzjpreview\PulseCrossref $crossref)
    {
        $this->Crossrefs->removeElement($crossref);
    }

    /**
     * Get crossrefs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCrossrefs()
    {
        return $this->Crossrefs;
    }

    /**
     * Add medium
     *
     * @param \Entity\Bzjpreview\PulseMedia $medium
     *
     * @return Pulse
     */
    public function addMedia(\Entity\Bzjpreview\PulseMedia $medium)
    {
        $this->Media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \Entity\Bzjpreview\PulseMedia $medium
     */
    public function removeMedia(\Entity\Bzjpreview\PulseMedia $medium)
    {
        $this->Media->removeElement($medium);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Add market
     *
     * @param \Entity\Bzjpreview\PulseMarketMap $market
     *
     * @return Pulse
     */
    public function addMarket(\Entity\Bzjpreview\PulseMarketMap $market)
    {
        $this->Markets[] = $market;

        return $this;
    }

    /**
     * Remove market
     *
     * @param \Entity\Bzjpreview\PulseMarketMap $market
     */
    public function removeMarket(\Entity\Bzjpreview\PulseMarketMap $market)
    {
        $this->Markets->removeElement($market);
    }

    /**
     * Get markets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkets()
    {
        return $this->Markets;
    }

    /**
     * Add question
     *
     * @param \Entity\Bzjpreview\PulseQuestion $question
     *
     * @return Pulse
     */
    public function addQuestion(\Entity\Bzjpreview\PulseQuestion $question)
    {
        $this->Questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \Entity\Bzjpreview\PulseQuestion $question
     */
    public function removeQuestion(\Entity\Bzjpreview\PulseQuestion $question)
    {
        $this->Questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->Questions;
    }

    /**
     * Add leadinGroup
     *
     * @param \Entity\Bzjpreview\PulseLeadinGroup $leadinGroup
     *
     * @return Pulse
     */
    public function addLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroup)
    {
        $this->LeadinGroups[] = $leadinGroup;

        return $this;
    }

    /**
     * Remove leadinGroup
     *
     * @param \Entity\Bzjpreview\PulseLeadinGroup $leadinGroup
     */
    public function removeLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroup)
    {
        $this->LeadinGroups->removeElement($leadinGroup);
    }

    /**
     * Get leadinGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeadinGroups()
    {
        return $this->LeadinGroups;
    }
}

