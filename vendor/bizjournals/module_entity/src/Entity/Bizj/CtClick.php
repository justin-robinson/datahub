<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtClick
 */
class CtClick extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $click_id;

    /**
     * @var integer
     */
    private $campaign_id;

    /**
     * @var string
     */
    private $source_url;

    /**
     * @var string
     */
    private $dest_url;

    /**
     * @var string
     */
    private $description;


    /**
     * Get click_id
     *
     * @return integer 
     */
    public function getClickId()
    {
        return $this->click_id;
    }

    /**
     * Set campaign_id
     *
     * @param integer $campaignId
     * @return CtClick
     */
    public function setCampaignId($campaignId)
    {
        $this->campaign_id = $campaignId;

        return $this;
    }

    /**
     * Get campaign_id
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Set source_url
     *
     * @param string $sourceUrl
     * @return CtClick
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->source_url = $sourceUrl;

        return $this;
    }

    /**
     * Get source_url
     *
     * @return string 
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * Set dest_url
     *
     * @param string $destUrl
     * @return CtClick
     */
    public function setDestUrl($destUrl)
    {
        $this->dest_url = $destUrl;

        return $this;
    }

    /**
     * Get dest_url
     *
     * @return string 
     */
    public function getDestUrl()
    {
        return $this->dest_url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CtClick
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
}
