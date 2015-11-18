<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industry
 */
class Industry extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $industry_id;

    /**
     * @var string
     */
    private $industry_code;

    /**
     * @var string
     */
    private $industry_name;

    /**
     * @var string
     */
    private $short_name;

    /**
     * @var boolean
     */
    private $active = '1';

    /**
     * @var boolean
     */
    private $hidden = '0';

    /**
     * @var integer
     */
    private $feed_id;

    /**
     * @var string
     */
    private $nstein_name;

    /**
     * @var string
     */
    private $iana_value;


    /**
     * Get industry_id
     *
     * @return integer 
     */
    public function getIndustryId()
    {
        return $this->industry_id;
    }

    /**
     * Set industry_code
     *
     * @param string $industryCode
     * @return Industry
     */
    public function setIndustryCode($industryCode)
    {
        $this->industry_code = $industryCode;

        return $this;
    }

    /**
     * Get industry_code
     *
     * @return string 
     */
    public function getIndustryCode()
    {
        return $this->industry_code;
    }

    /**
     * Set industry_name
     *
     * @param string $industryName
     * @return Industry
     */
    public function setIndustryName($industryName)
    {
        $this->industry_name = $industryName;

        return $this;
    }

    /**
     * Get industry_name
     *
     * @return string 
     */
    public function getIndustryName()
    {
        return $this->industry_name;
    }

    /**
     * Set short_name
     *
     * @param string $shortName
     * @return Industry
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get short_name
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Industry
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
     * Set hidden
     *
     * @param boolean $hidden
     * @return Industry
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean 
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set feed_id
     *
     * @param integer $feedId
     * @return Industry
     */
    public function setFeedId($feedId)
    {
        $this->feed_id = $feedId;

        return $this;
    }

    /**
     * Get feed_id
     *
     * @return integer 
     */
    public function getFeedId()
    {
        return $this->feed_id;
    }

    /**
     * Set nstein_name
     *
     * @param string $nsteinName
     * @return Industry
     */
    public function setNsteinName($nsteinName)
    {
        $this->nstein_name = $nsteinName;

        return $this;
    }

    /**
     * Get nstein_name
     *
     * @return string 
     */
    public function getNsteinName()
    {
        return $this->nstein_name;
    }

    /**
     * Set iana_value
     *
     * @param string $ianaValue
     * @return Industry
     */
    public function setIanaValue($ianaValue)
    {
        $this->iana_value = $ianaValue;

        return $this;
    }

    /**
     * Get iana_value
     *
     * @return string 
     */
    public function getIanaValue()
    {
        return $this->iana_value;
    }
}
