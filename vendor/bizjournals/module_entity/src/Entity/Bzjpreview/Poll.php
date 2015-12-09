<?php

namespace Entity\Bzjpreview;

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
     * Set pollId
     *
     * @param integer $pollId
     *
     * @return Poll
     */
    public function setPollId($pollId)
    {
        $this->poll_id = $pollId;

        return $this;
    }

    /**
     * Get pollId
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
     *
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
     *
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
     *
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
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Poll
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
     * @return Poll
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
     * Set active
     *
     * @param boolean $active
     *
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
     * Set displayResults
     *
     * @param boolean $displayResults
     *
     * @return Poll
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
     * Set recipientsFinal
     *
     * @param string $recipientsFinal
     *
     * @return Poll
     */
    public function setRecipientsFinal($recipientsFinal)
    {
        $this->recipients_final = $recipientsFinal;

        return $this;
    }

    /**
     * Get recipientsFinal
     *
     * @return string
     */
    public function getRecipientsFinal()
    {
        return $this->recipients_final;
    }

    /**
     * Set recipientsDaily
     *
     * @param string $recipientsDaily
     *
     * @return Poll
     */
    public function setRecipientsDaily($recipientsDaily)
    {
        $this->recipients_daily = $recipientsDaily;

        return $this;
    }

    /**
     * Get recipientsDaily
     *
     * @return string
     */
    public function getRecipientsDaily()
    {
        return $this->recipients_daily;
    }

    /**
     * Set siteId
     *
     * @param integer $siteId
     *
     * @return Poll
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get siteId
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
     *
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
     * Set hasComments
     *
     * @param boolean $hasComments
     *
     * @return Poll
     */
    public function setHasComments($hasComments)
    {
        $this->has_comments = $hasComments;

        return $this;
    }

    /**
     * Get hasComments
     *
     * @return boolean
     */
    public function getHasComments()
    {
        return $this->has_comments;
    }

    /**
     * Set hasSponsor
     *
     * @param boolean $hasSponsor
     *
     * @return Poll
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
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return Poll
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
     * Set mTime
     *
     * @param \DateTime $mTime
     *
     * @return Poll
     */
    public function setMTime($mTime)
    {
        $this->m_time = $mTime;

        return $this;
    }

    /**
     * Get mTime
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
     *
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
     *
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
     *
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
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return Poll
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
     * @return Poll
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
     * Set metaKeywords
     *
     * @param string $metaKeywords
     *
     * @return Poll
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Add question
     *
     * @param \Entity\Bzjpreview\PollQuestion $question
     *
     * @return Poll
     */
    public function addQuestion(\Entity\Bzjpreview\PollQuestion $question)
    {
        $this->Questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \Entity\Bzjpreview\PollQuestion $question
     */
    public function removeQuestion(\Entity\Bzjpreview\PollQuestion $question)
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
}

