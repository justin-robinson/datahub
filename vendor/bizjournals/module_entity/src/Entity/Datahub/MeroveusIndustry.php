<?php

namespace Entity\Datahub;

/**
 * MeroveusIndustry
 */
class MeroveusIndustry extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $meroveus_industry_id;

    /**
     * @var integer
     */
    private $external_id;

    /**
     * @var string
     */
    private $industry;


    /**
     * Set meroveusIndustryId
     *
     * @param integer $meroveusIndustryId
     *
     * @return MeroveusIndustry
     */
    public function setMeroveusIndustryId($meroveusIndustryId)
    {
        $this->meroveus_industry_id = $meroveusIndustryId;

        return $this;
    }

    /**
     * Get meroveusIndustryId
     *
     * @return integer
     */
    public function getMeroveusIndustryId()
    {
        return $this->meroveus_industry_id;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return MeroveusIndustry
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * Set industry
     *
     * @param string $industry
     *
     * @return MeroveusIndustry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return string
     */
    public function getIndustry()
    {
        return $this->industry;
    }
}

