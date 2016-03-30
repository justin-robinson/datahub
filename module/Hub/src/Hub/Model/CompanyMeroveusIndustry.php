<?php

namespace Entity\Datahub;

/**
 * CompanyMeroveusIndustry
 */
class CompanyMeroveusIndustry extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $hub_id;

    /**
     * @var integer
     */
    private $meroveus_industry_id;

    /**
     * @var \Entity\Datahub\Company
     */
    private $Company;


    /**
     * Set hubId
     *
     * @param integer $hubId
     *
     * @return CompanyMeroveusIndustry
     */
    public function setHubId($hubId)
    {
        $this->hub_id = $hubId;

        return $this;
    }

    /**
     * Get hubId
     *
     * @return integer
     */
    public function getHubId()
    {
        return $this->hub_id;
    }

    /**
     * Set meroveusIndustryId
     *
     * @param integer $meroveusIndustryId
     *
     * @return CompanyMeroveusIndustry
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
     * Set company
     *
     * @param \Entity\Datahub\Company $company
     *
     * @return CompanyMeroveusIndustry
     */
    public function setCompany(\Entity\Datahub\Company $company = null)
    {
        $this->Company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Entity\Datahub\Company
     */
    public function getCompany()
    {
        return $this->Company;
    }
}

