<?php

namespace Entity\Bizj;

/**
 * EvSponsorTier
 */
class EvSponsorTier extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $tier_id;

    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var integer
     */
    private $level = 0;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var integer
     */
    private $available = 0;

    /**
     * @var string
     */
    private $benefits;

    /**
     * @var string
     */
    private $other_benefits;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Sponsors;

    /**
     * @var \Entity\Bizj\EvEvent
     */
    private $Event;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Sponsors = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return EvSponsorTier
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
     * Set level
     *
     * @param integer $level
     *
     * @return EvSponsorTier
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return EvSponsorTier
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
     * Set cost
     *
     * @param string $cost
     *
     * @return EvSponsorTier
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set available
     *
     * @param integer $available
     *
     * @return EvSponsorTier
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return integer
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set benefits
     *
     * @param string $benefits
     *
     * @return EvSponsorTier
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;

        return $this;
    }

    /**
     * Get benefits
     *
     * @return string
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Set otherBenefits
     *
     * @param string $otherBenefits
     *
     * @return EvSponsorTier
     */
    public function setOtherBenefits($otherBenefits)
    {
        $this->other_benefits = $otherBenefits;

        return $this;
    }

    /**
     * Get otherBenefits
     *
     * @return string
     */
    public function getOtherBenefits()
    {
        return $this->other_benefits;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return EvSponsorTier
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
     * Add sponsor
     *
     * @param \Entity\Bizj\EvSponsor $sponsor
     *
     * @return EvSponsorTier
     */
    public function addSponsor(\Entity\Bizj\EvSponsor $sponsor)
    {
        $this->Sponsors[] = $sponsor;

        return $this;
    }

    /**
     * Remove sponsor
     *
     * @param \Entity\Bizj\EvSponsor $sponsor
     */
    public function removeSponsor(\Entity\Bizj\EvSponsor $sponsor)
    {
        $this->Sponsors->removeElement($sponsor);
    }

    /**
     * Get sponsors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSponsors()
    {
        return $this->Sponsors;
    }

    /**
     * Set event
     *
     * @param \Entity\Bizj\EvEvent $event
     *
     * @return EvSponsorTier
     */
    public function setEvent(\Entity\Bizj\EvEvent $event = null)
    {
        $this->Event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Entity\Bizj\EvEvent
     */
    public function getEvent()
    {
        return $this->Event;
    }
}

