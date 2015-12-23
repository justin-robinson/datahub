<?php

namespace Entity\Bizj;

/**
 * PulseResponse
 */
class PulseResponse extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $response_id;

    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var string
     */
    private $uin;

    /**
     * @var string
     */
    private $ip_address;

    /**
     * @var integer
     */
    private $score = 0;

    /**
     * @var string
     */
    private $rating;

    /**
     * @var boolean
     */
    private $is_complete = false;

    /**
     * @var boolean
     */
    private $is_invalid = false;

    /**
     * @var boolean
     */
    private $is_geocoded = false;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var string
     */
    private $state_province;

    /**
     * @var string
     */
    private $country;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ResponseData;

    /**
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ResponseData = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get responseId
     *
     * @return integer
     */
    public function getResponseId()
    {
        return $this->response_id;
    }

    /**
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseResponse
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
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return PulseResponse
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
     * Set uin
     *
     * @param string $uin
     *
     * @return PulseResponse
     */
    public function setUin($uin)
    {
        $this->uin = $uin;

        return $this;
    }

    /**
     * Get uin
     *
     * @return string
     */
    public function getUin()
    {
        return $this->uin;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return PulseResponse
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return PulseResponse
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set rating
     *
     * @param string $rating
     *
     * @return PulseResponse
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set isComplete
     *
     * @param boolean $isComplete
     *
     * @return PulseResponse
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get isComplete
     *
     * @return boolean
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set isInvalid
     *
     * @param boolean $isInvalid
     *
     * @return PulseResponse
     */
    public function setIsInvalid($isInvalid)
    {
        $this->is_invalid = $isInvalid;

        return $this;
    }

    /**
     * Get isInvalid
     *
     * @return boolean
     */
    public function getIsInvalid()
    {
        return $this->is_invalid;
    }

    /**
     * Set isGeocoded
     *
     * @param boolean $isGeocoded
     *
     * @return PulseResponse
     */
    public function setIsGeocoded($isGeocoded)
    {
        $this->is_geocoded = $isGeocoded;

        return $this;
    }

    /**
     * Get isGeocoded
     *
     * @return boolean
     */
    public function getIsGeocoded()
    {
        return $this->is_geocoded;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return PulseResponse
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     *
     * @return PulseResponse
     */
    public function setStateProvince($stateProvince)
    {
        $this->state_province = $stateProvince;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string
     */
    public function getStateProvince()
    {
        return $this->state_province;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return PulseResponse
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseResponse
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
     * @return PulseResponse
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
     * Add responseDatum
     *
     * @param \Entity\Bizj\PulseResponseData $responseDatum
     *
     * @return PulseResponse
     */
    public function addResponseDatum(\Entity\Bizj\PulseResponseData $responseDatum)
    {
        $this->ResponseData[] = $responseDatum;

        return $this;
    }

    /**
     * Remove responseDatum
     *
     * @param \Entity\Bizj\PulseResponseData $responseDatum
     */
    public function removeResponseDatum(\Entity\Bizj\PulseResponseData $responseDatum)
    {
        $this->ResponseData->removeElement($responseDatum);
    }

    /**
     * Get responseData
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponseData()
    {
        return $this->ResponseData;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     *
     * @return PulseResponse
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bizj\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}

