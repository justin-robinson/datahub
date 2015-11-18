<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Get staff_id
     *
     * @return integer 
     */
    public function getStaffId()
    {
        return $this->staff_id;
    }

    /**
     * Set market_id
     *
     * @param integer $marketId
     * @return MarketStaff
     */
    public function setMarketId($marketId)
    {
        $this->market_id = $marketId;

        return $this;
    }

    /**
     * Get market_id
     *
     * @return integer 
     */
    public function getMarketId()
    {
        return $this->market_id;
    }

    /**
     * Set contact_id
     *
     * @param integer $contactId
     * @return MarketStaff
     */
    public function setContactId($contactId)
    {
        $this->contact_id = $contactId;

        return $this;
    }

    /**
     * Get contact_id
     *
     * @return integer 
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set is_writer
     *
     * @param boolean $isWriter
     * @return MarketStaff
     */
    public function setIsWriter($isWriter)
    {
        $this->is_writer = $isWriter;

        return $this;
    }

    /**
     * Get is_writer
     *
     * @return boolean 
     */
    public function getIsWriter()
    {
        return $this->is_writer;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MarketStaff
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return MarketStaff
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set is_former_staff
     *
     * @param boolean $isFormerStaff
     * @return MarketStaff
     */
    public function setIsFormerStaff($isFormerStaff)
    {
        $this->is_former_staff = $isFormerStaff;

        return $this;
    }

    /**
     * Get is_former_staff
     *
     * @return boolean 
     */
    public function getIsFormerStaff()
    {
        return $this->is_former_staff;
    }

    /**
     * Set is_contributor
     *
     * @param boolean $isContributor
     * @return MarketStaff
     */
    public function setIsContributor($isContributor)
    {
        $this->is_contributor = $isContributor;

        return $this;
    }

    /**
     * Get is_contributor
     *
     * @return boolean 
     */
    public function getIsContributor()
    {
        return $this->is_contributor;
    }

    /**
     * Set Market
     *
     * @param \Entity\Bizj\Market $market
     * @return MarketStaff
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get Market
     *
     * @return \Entity\Bizj\Market 
     */
    public function getMarket()
    {
        return $this->Market;
    }

    /**
     * Set ContactData
     *
     * @param \Entity\Bizj\ContactData $contactData
     * @return MarketStaff
     */
    public function setContactData(\Entity\Bizj\ContactData $contactData = null)
    {
        $this->ContactData = $contactData;

        return $this;
    }

    /**
     * Get ContactData
     *
     * @return \Entity\Bizj\ContactData 
     */
    public function getContactData()
    {
        return $this->ContactData;
    }
}
