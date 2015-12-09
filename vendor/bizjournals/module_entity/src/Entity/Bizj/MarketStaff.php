<?php

namespace Entity\Bizj;

/**
 * MarketStaff
 */
class MarketStaff extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $staff_id;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var integer
     */
    private $contact_id;

    /**
     * @var boolean
     */
    private $is_writer = false;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var boolean
     */
    private $is_former_staff = false;

    /**
     * @var boolean
     */
    private $is_contributor = false;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;

    /**
     * @var \Entity\Bizj\ContactData
     */
    private $ContactData;


    /**
     * Get staffId
     *
     * @return integer
     */
    public function getStaffId()
    {
        return $this->staff_id;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return MarketStaff
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
     * Set contactId
     *
     * @param integer $contactId
     *
     * @return MarketStaff
     */
    public function setContactId($contactId)
    {
        $this->contact_id = $contactId;

        return $this;
    }

    /**
     * Get contactId
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set isWriter
     *
     * @param boolean $isWriter
     *
     * @return MarketStaff
     */
    public function setIsWriter($isWriter)
    {
        $this->is_writer = $isWriter;

        return $this;
    }

    /**
     * Get isWriter
     *
     * @return boolean
     */
    public function getIsWriter()
    {
        return $this->is_writer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MarketStaff
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
     * @return MarketStaff
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
     * Set isFormerStaff
     *
     * @param boolean $isFormerStaff
     *
     * @return MarketStaff
     */
    public function setIsFormerStaff($isFormerStaff)
    {
        $this->is_former_staff = $isFormerStaff;

        return $this;
    }

    /**
     * Get isFormerStaff
     *
     * @return boolean
     */
    public function getIsFormerStaff()
    {
        return $this->is_former_staff;
    }

    /**
     * Set isContributor
     *
     * @param boolean $isContributor
     *
     * @return MarketStaff
     */
    public function setIsContributor($isContributor)
    {
        $this->is_contributor = $isContributor;

        return $this;
    }

    /**
     * Get isContributor
     *
     * @return boolean
     */
    public function getIsContributor()
    {
        return $this->is_contributor;
    }

    /**
     * Set market
     *
     * @param \Entity\Bizj\Market $market
     *
     * @return MarketStaff
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

    /**
     * Set contactData
     *
     * @param \Entity\Bizj\ContactData $contactData
     *
     * @return MarketStaff
     */
    public function setContactData(\Entity\Bizj\ContactData $contactData = null)
    {
        $this->ContactData = $contactData;

        return $this;
    }

    /**
     * Get contactData
     *
     * @return \Entity\Bizj\ContactData
     */
    public function getContactData()
    {
        return $this->ContactData;
    }
}

