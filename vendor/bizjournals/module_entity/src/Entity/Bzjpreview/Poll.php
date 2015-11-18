<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poll
 */
class Poll extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $poll_id;

    /**
     * @var string
     */
    private $market = 'bizj';

    /**
     * @var string
     */
    private $headline;

    /**
     * @var string
     */
    private $teaser;

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
    private $active = true;

    /**
     * @var boolean
     */
    private $display_results = true;

    /**
     * @var string
     */
    private $recipients_final;

    /**
     * @var string
     */
    private $recipients_daily;

    /**
     * @var integer
     */
    private $site_id = 1;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $has_comments = false;

    /**
     * @var boolean
     */
    private $has_sponsor = false;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var \DateTime
     */
    private $m_time;

    /**
     * @var boolean
     */
    private $featured = false;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $meta_title;

    /**
     * @var string
     */
    private $meta_description;

    /**
     * @var string
     */
    private $meta_keywords;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set poll_id
     *
     * @param integer $pollId
     * @return Poll
     */
    public function setPollId($pollId)
    {
        $this->poll_id = $pollId;

        return $this;
    }

    /**
     * Get poll_id
     *
     * @return integer 
     */
    public function getPollId()
    {
        return $this->poll_id;
    }

    /**
     * Set market
     *
     * @param string $market
     * @return Poll
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
     * Set headline
     *
     * @param string $headline
     * @return Poll
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
     * Set teaser
     *
     * @param string $teaser
     * @return Poll
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Poll
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
     * @return Poll
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
     * Set active
     *
     * @param boolean $active
     * @return Poll
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
     * Set display_results
     *
     * @param boolean $displayResults
     * @return Poll
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
     * Set recipients_final
     *
     * @param string $recipientsFinal
     * @return Poll
     */
    public function setRecipientsFinal($recipientsFinal)
    {
        $this->recipients_final = $recipientsFinal;

        return $this;
    }

    /**
     * Get recipients_final
     *
     * @return string 
     */
    public function getRecipientsFinal()
    {
        return $this->recipients_final;
    }

    /**
     * Set recipients_daily
     *
     * @param string $recipientsDaily
     * @return Poll
     */
    public function setRecipientsDaily($recipientsDaily)
    {
        $this->recipients_daily = $recipientsDaily;

        return $this;
    }

    /**
     * Get recipients_daily
     *
     * @return string 
     */
    public function getRecipientsDaily()
    {
        return $this->recipients_daily;
    }

    /**
     * Set site_id
     *
     * @param integer $siteId
     * @return Poll
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get site_id
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Poll
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
     * Set has_comments
     *
     * @param boolean $hasComments
     * @return Poll
     */
    public function setHasComments($hasComments)
    {
        $this->has_comments = $hasComments;

        return $this;
    }

    /**
     * Get has_comments
     *
     * @return boolean 
     */
    public function getHasComments()
    {
        return $this->has_comments;
    }

    /**
     * Set has_sponsor
     *
     * @param boolean $hasSponsor
     * @return Poll
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
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return Poll
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set m_time
     *
     * @param \DateTime $mTime
     * @return Poll
     */
    public function setMTime($mTime)
    {
        $this->m_time = $mTime;

        return $this;
    }

    /**
     * Get m_time
     *
     * @return \DateTime 
     */
    public function getMTime()
    {
        return $this->m_time;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     * @return Poll
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return boolean 
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Poll
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Poll
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set meta_title
     *
     * @param string $metaTitle
     * @return Poll
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
     * @return Poll
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
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return Poll
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;

        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Add Questions
     *
     * @param \Entity\Bzjpreview\PollQuestion $questions
     * @return Poll
     */
    public function addQuestion(\Entity\Bzjpreview\PollQuestion $questions)
    {
        $this->Questions[] = $questions;

        return $this;
    }

    /**
     * Remove Questions
     *
     * @param \Entity\Bzjpreview\PollQuestion $questions
     */
    public function removeQuestion(\Entity\Bzjpreview\PollQuestion $questions)
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
}
