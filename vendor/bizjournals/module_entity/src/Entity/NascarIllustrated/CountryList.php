<?php

namespace Entity\NascarIllustrated;

use Doctrine\ORM\Mapping as ORM;

/**
 * CountryList
 */
class CountryList extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $country_code;

    /**
     * @var string
     */
    private $alpha3;

    /**
     * @var string
     */
    private $country;


    /**
     * Set country_code
     *
     * @param string $countryCode
     * @return CountryList
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }

    /**
     * Get country_code
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return CountryList
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return CountryList
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
}
