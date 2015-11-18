<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

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
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return Pulse
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulse_id
     *
     * @return integer 
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set pulse_type
     *
     * @param string $pulseType
     * @return Pulse
     */
    public function setPulseType($pulseType)
    {
        $this->pulse_type = $pulseType;

        return $this;
    }

    /**
     * Get pulse_type
     *
     * @return string 
     */
    public function getPulseType()
    {
        return $this->pulse_type;
    }

    /**
     * Set primary_market_id
     *
     * @param integer $primaryMarketId
     * @return Pulse
     */
    public function setPrimaryMarketId($primaryMarketId)
    {
        $this->primary_market_id = $primaryMarketId;

        return $this;
    }

    /**
     * Get primary_market_id
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
     * Set short_headline
     *
     * @param string $shortHeadline
     * @return Pulse
     */
    public function setShortHeadline($shortHeadline)
    {
        $this->short_headline = $shortHeadline;

        return $this;
    }

    /**
     * Get short_headline
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
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Pulse
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get start_time
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set end_time
     *
     * @param \DateTime $endTime
     * @return Pulse
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get end_time
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set is_evergreen
     *
     * @param boolean $isEvergreen
     * @return Pulse
     */
    public function setIsEvergreen($isEvergreen)
    {
        $this->is_evergreen = $isEvergreen;

        return $this;
    }

    /**
     * Get is_evergreen
     *
     * @return boolean 
     */
    public function getIsEvergreen()
    {
        return $this->is_evergreen;
    }

    /**
     * Set is_featured
     *
     * @param boolean $isFeatured
     * @return Pulse
     */
    public function setIsFeatured($isFeatured)
    {
        $this->is_featured = $isFeatured;

        return $this;
    }

    /**
     * Get is_featured
     *
     * @return boolean 
     */
    public function getIsFeatured()
    {
        return $this->is_featured;
    }

    /**
     * Set is_national
     *
     * @param boolean $isNational
     * @return Pulse
     */
    public function setIsNational($isNational)
    {
        $this->is_national = $isNational;

        return $this;
    }

    /**
     * Get is_national
     *
     * @return boolean 
     */
    public function getIsNational()
    {
        return $this->is_national;
    }

    /**
     * Set has_sponsor
     *
     * @param boolean $hasSponsor
     * @return Pulse
     */
    public function setHasSponsor($hasSponsor)
    {
        $this->has_sponsor = $hasSponsor;

        return $this;
    }

    /**
     * Get has_sponsor
     *
     * @return boolean 
     */
    public function getHasSponsor()
    {
        return $this->has_sponsor;
    }

    /**
     * Set allow_comments
     *
     * @param boolean $allowComments
     * @return Pulse
     */
    public function setAllowComments($allowComments)
    {
        $this->allow_comments = $allowComments;

        return $this;
    }

    /**
     * Get allow_comments
     *
     * @return boolean 
     */
    public function getAllowComments()
    {
        return $this->allow_comments;
    }

    /**
     * Set display_results
     *
     * @param boolean $displayResults
     * @return Pulse
     */
    public function setDisplayResults($displayResults)
    {
        $this->display_results = $displayResults;

        return $this;
    }

    /**
     * Get display_results
     *
     * @return boolean 
     */
    public function getDisplayResults()
    {
        return $this->display_results;
    }

    /**
     * Set meta_title
     *
     * @param string $metaTitle
     * @return Pulse
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;

        return $this;
    }

    /**
     * Get meta_title
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return Pulse
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set estimated_response_count
     *
     * @param integer $estimatedResponseCount
     * @return Pulse
     */
    public function setEstimatedResponseCount($estimatedResponseCount)
    {
        $this->estimated_response_count = $estimatedResponseCount;

        return $this;
    }

    /**
     * Get estimated_response_count
     *
     * @return integer 
     */
    public function getEstimatedResponseCount()
    {
        return $this->estimated_response_count;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Pulse
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
     * @return Pulse
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
     * @return Pulse
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

    /**
     * Add Crossrefs
     *
     * @param \Entity\Bzjpreview\PulseCrossref $crossrefs
     * @return Pulse
     */
    public function addCrossref(\Entity\Bzjpreview\PulseCrossref $crossrefs)
    {
        $this->Crossrefs[] = $crossrefs;

        return $this;
    }

    /**
     * Remove Crossrefs
     *
     * @param \Entity\Bzjpreview\PulseCrossref $crossrefs
     */
    public function removeCrossref(\Entity\Bzjpreview\PulseCrossref $crossrefs)
    {
        $this->Crossrefs->removeElement($crossrefs);
    }

    /**
     * Get Crossrefs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCrossrefs()
    {
        return $this->Crossrefs;
    }

    /**
     * Add Media
     *
     * @param \Entity\Bzjpreview\PulseMedia $media
     * @return Pulse
     */
    public function addMedia(\Entity\Bzjpreview\PulseMedia $media)
    {
        $this->Media[] = $media;

        return $this;
    }

    /**
     * Remove Media
     *
     * @param \Entity\Bzjpreview\PulseMedia $media
     */
    public function removeMedia(\Entity\Bzjpreview\PulseMedia $media)
    {
        $this->Media->removeElement($media);
    }

    /**
     * Get Media
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Add Markets
     *
     * @param \Entity\Bzjpreview\PulseMarketMap $markets
     * @return Pulse
     */
    public function addMarket(\Entity\Bzjpreview\PulseMarketMap $markets)
    {
        $this->Markets[] = $markets;

        return $this;
    }

    /**
     * Remove Markets
     *
     * @param \Entity\Bzjpreview\PulseMarketMap $markets
     */
    public function removeMarket(\Entity\Bzjpreview\PulseMarketMap $markets)
    {
        $this->Markets->removeElement($markets);
    }

    /**
     * Get Markets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMarkets()
    {
        return $this->Markets;
    }

    /**
     * Add Questions
     *
     * @param \Entity\Bzjpreview\PulseQuestion $questions
     * @return Pulse
     */
    public function addQuestion(\Entity\Bzjpreview\PulseQuestion $questions)
    {
        $this->Questions[] = $questions;

        return $this;
    }

    /**
     * Remove Questions
     *
     * @param \Entity\Bzjpreview\PulseQuestion $questions
     */
    public function removeQuestion(\Entity\Bzjpreview\PulseQuestion $questions)
    {
        $this->Questions->removeElement($questions);
    }

    /**
     * Get Questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->Questions;
    }

    /**
     * Add LeadinGroups
     *
     * @param \Entity\Bzjpreview\PulseLeadinGroup $leadinGroups
     * @return Pulse
     */
    public function addLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroups)
    {
        $this->LeadinGroups[] = $leadinGroups;

        return $this;
    }

    /**
     * Remove LeadinGroups
     *
     * @param \Entity\Bzjpreview\PulseLeadinGroup $leadinGroups
     */
    public function removeLeadinGroup(\Entity\Bzjpreview\PulseLeadinGroup $leadinGroups)
    {
        $this->LeadinGroups->removeElement($leadinGroups);
    }

    /**
     * Get LeadinGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeadinGroups()
    {
        return $this->LeadinGroups;
    }
}
