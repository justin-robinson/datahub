<?php

namespace Entity\Datahub;

/**
 * FipsCounty
 */
class FipsCounty extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $fips_code;

    /**
     * @var string
     */
    private $state_code;

    /**
     * @var string
     */
    private $county;

    /**
     * @var string
     */
    private $msa;

    /**
     * @var string
     */
    private $pmsa;

    /**
     * @var boolean
     */
    private $is_outlying = false;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ZipCodes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ZipCodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fipsCode
     *
     * @param integer $fipsCode
     *
     * @return FipsCounty
     */
    public function setFipsCode($fipsCode)
    {
        $this->fips_code = $fipsCode;

        return $this;
    }

    /**
     * Get fipsCode
     *
     * @return integer
     */
    public function getFipsCode()
    {
        return $this->fips_code;
    }

    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return FipsCounty
     */
    public function setStateCode($stateCode)
    {
        $this->state_code = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return string
     */
    public function getStateCode()
    {
        return $this->state_code;
    }

    /**
     * Set county
     *
     * @param string $county
     *
     * @return FipsCounty
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set msa
     *
     * @param string $msa
     *
     * @return FipsCounty
     */
    public function setMsa($msa)
    {
        $this->msa = $msa;

        return $this;
    }

    /**
     * Get msa
     *
     * @return string
     */
    public function getMsa()
    {
        return $this->msa;
    }

    /**
     * Set pmsa
     *
     * @param string $pmsa
     *
     * @return FipsCounty
     */
    public function setPmsa($pmsa)
    {
        $this->pmsa = $pmsa;

        return $this;
    }

    /**
     * Get pmsa
     *
     * @return string
     */
    public function getPmsa()
    {
        return $this->pmsa;
    }

    /**
     * Set isOutlying
     *
     * @param boolean $isOutlying
     *
     * @return FipsCounty
     */
    public function setIsOutlying($isOutlying)
    {
        $this->is_outlying = $isOutlying;

        return $this;
    }

    /**
     * Get isOutlying
     *
     * @return boolean
     */
    public function getIsOutlying()
    {
        return $this->is_outlying;
    }

    /**
     * Add zipCode
     *
     * @param \Entity\Datahub\ZipCode $zipCode
     *
     * @return FipsCounty
     */
    public function addZipCode(\Entity\Datahub\ZipCode $zipCode)
    {
        $this->ZipCodes[] = $zipCode;

        return $this;
    }

    /**
     * Remove zipCode
     *
     * @param \Entity\Datahub\ZipCode $zipCode
     */
    public function removeZipCode(\Entity\Datahub\ZipCode $zipCode)
    {
        $this->ZipCodes->removeElement($zipCode);
    }

    /**
     * Get zipCodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZipCodes()
    {
        return $this->ZipCodes;
    }
}

