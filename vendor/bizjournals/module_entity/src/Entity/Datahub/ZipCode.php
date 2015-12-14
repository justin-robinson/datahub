<?php

namespace Entity\Datahub;

/**
 * ZipCode
 */
class ZipCode extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $zip_code;

    /**
     * @var string
     */
    private $city_name;

    /**
     * @var string
     */
    private $state_code;

    /**
     * @var string
     */
    private $area_code;

    /**
     * @var integer
     */
    private $fips_code;

    /**
     * @var string
     */
    private $msa_or_pmsa;

    /**
     * @var integer
     */
    private $utc_std_offset;

    /**
     * @var integer
     */
    private $utc_dst_offset;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $city_type = 'default';

    /**
     * @var string
     */
    private $zip_type = 'standard';


    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return ZipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zip_code = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     *
     * @return ZipCode
     */
    public function setCityName($cityName)
    {
        $this->city_name = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return ZipCode
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
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return ZipCode
     */
    public function setAreaCode($areaCode)
    {
        $this->area_code = $areaCode;

        return $this;
    }

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode()
    {
        return $this->area_code;
    }

    /**
     * Set fipsCode
     *
     * @param integer $fipsCode
     *
     * @return ZipCode
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
     * Set msaOrPmsa
     *
     * @param string $msaOrPmsa
     *
     * @return ZipCode
     */
    public function setMsaOrPmsa($msaOrPmsa)
    {
        $this->msa_or_pmsa = $msaOrPmsa;

        return $this;
    }

    /**
     * Get msaOrPmsa
     *
     * @return string
     */
    public function getMsaOrPmsa()
    {
        return $this->msa_or_pmsa;
    }

    /**
     * Set utcStdOffset
     *
     * @param integer $utcStdOffset
     *
     * @return ZipCode
     */
    public function setUtcStdOffset($utcStdOffset)
    {
        $this->utc_std_offset = $utcStdOffset;

        return $this;
    }

    /**
     * Get utcStdOffset
     *
     * @return integer
     */
    public function getUtcStdOffset()
    {
        return $this->utc_std_offset;
    }

    /**
     * Set utcDstOffset
     *
     * @param integer $utcDstOffset
     *
     * @return ZipCode
     */
    public function setUtcDstOffset($utcDstOffset)
    {
        $this->utc_dst_offset = $utcDstOffset;

        return $this;
    }

    /**
     * Get utcDstOffset
     *
     * @return integer
     */
    public function getUtcDstOffset()
    {
        return $this->utc_dst_offset;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return ZipCode
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return ZipCode
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set cityType
     *
     * @param string $cityType
     *
     * @return ZipCode
     */
    public function setCityType($cityType)
    {
        $this->city_type = $cityType;

        return $this;
    }

    /**
     * Get cityType
     *
     * @return string
     */
    public function getCityType()
    {
        return $this->city_type;
    }

    /**
     * Set zipType
     *
     * @param string $zipType
     *
     * @return ZipCode
     */
    public function setZipType($zipType)
    {
        $this->zip_type = $zipType;

        return $this;
    }

    /**
     * Get zipType
     *
     * @return string
     */
    public function getZipType()
    {
        return $this->zip_type;
    }
}

