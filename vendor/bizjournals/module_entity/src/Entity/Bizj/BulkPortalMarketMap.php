<?php

namespace Entity\Bizj;

/**
 * BulkPortalMarketMap
 */
class BulkPortalMarketMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $portal_id;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var boolean
     */
    private $is_primary;

    /**
     * @var integer
     */
    private $license_count;

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $ip_range;

    /**
     * @var string
     */
    private $updated_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizj\BulkPortal
     */
    private $BulkPortal;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;


    /**
     * Set portalId
     *
     * @param integer $portalId
     *
     * @return BulkPortalMarketMap
     */
    public function setPortalId($portalId)
    {
        $this->portal_id = $portalId;

        return $this;
    }

    /**
     * Get portalId
     *
     * @return integer
     */
    public function getPortalId()
    {
        return $this->portal_id;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return BulkPortalMarketMap
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
     * Set isPrimary
     *
     * @param boolean $isPrimary
     *
     * @return BulkPortalMarketMap
     */
    public function setIsPrimary($isPrimary)
    {
        $this->is_primary = $isPrimary;

        return $this;
    }

    /**
     * Get isPrimary
     *
     * @return boolean
     */
    public function getIsPrimary()
    {
        return $this->is_primary;
    }

    /**
     * Set licenseCount
     *
     * @param integer $licenseCount
     *
     * @return BulkPortalMarketMap
     */
    public function setLicenseCount($licenseCount)
    {
        $this->license_count = $licenseCount;

        return $this;
    }

    /**
     * Get licenseCount
     *
     * @return integer
     */
    public function getLicenseCount()
    {
        return $this->license_count;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return BulkPortalMarketMap
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * Set ipRange
     *
     * @param string $ipRange
     *
     * @return BulkPortalMarketMap
     */
    public function setIpRange($ipRange)
    {
        $this->ip_range = $ipRange;

        return $this;
    }

    /**
     * Get ipRange
     *
     * @return string
     */
    public function getIpRange()
    {
        return $this->ip_range;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return BulkPortalMarketMap
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BulkPortalMarketMap
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
     * @return BulkPortalMarketMap
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
     * Set bulkPortal
     *
     * @param \Entity\Bizj\BulkPortal $bulkPortal
     *
     * @return BulkPortalMarketMap
     */
    public function setBulkPortal(\Entity\Bizj\BulkPortal $bulkPortal = null)
    {
        $this->BulkPortal = $bulkPortal;

        return $this;
    }

    /**
     * Get bulkPortal
     *
     * @return \Entity\Bizj\BulkPortal
     */
    public function getBulkPortal()
    {
        return $this->BulkPortal;
    }

    /**
     * Set market
     *
     * @param \Entity\Bizj\Market $market
     *
     * @return BulkPortalMarketMap
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Entity\Bizj\Market
     */
    public function getMarket()
    {
        return $this->Market;
    }
}

