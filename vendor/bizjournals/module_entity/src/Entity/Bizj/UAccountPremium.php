<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * UAccountPremium
 */
class UAccountPremium extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $premium_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var integer
     */
    private $subscription_number;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $source = 'unspecified';

    /**
     * @var string
     */
    private $premium_type = 'print-edition';

    /**
     * @var string
     */
    private $added_by;

    /**
     * @var string
     */
    private $modified_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizj\UAccount
     */
    private $User;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;

    /**
     * @var \Entity\Bizj\UAccount
     */
    private $UAccount;


    /**
     * Get premium_id
     *
     * @return integer 
     */
    public function getPremiumId()
    {
        return $this->premium_id;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return UAccountPremium
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set market_id
     *
     * @param integer $marketId
     * @return UAccountPremium
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
     * Set subscription_number
     *
     * @param integer $subscriptionNumber
     * @return UAccountPremium
     */
    public function setSubscriptionNumber($subscriptionNumber)
    {
        $this->subscription_number = $subscriptionNumber;

        return $this;
    }

    /**
     * Get subscription_number
     *
     * @return integer 
     */
    public function getSubscriptionNumber()
    {
        return $this->subscription_number;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return UAccountPremium
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return UAccountPremium
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return UAccountPremium
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set premium_type
     *
     * @param string $premiumType
     * @return UAccountPremium
     */
    public function setPremiumType($premiumType)
    {
        $this->premium_type = $premiumType;

        return $this;
    }

    /**
     * Get premium_type
     *
     * @return string 
     */
    public function getPremiumType()
    {
        return $this->premium_type;
    }

    /**
     * Set added_by
     *
     * @param string $addedBy
     * @return UAccountPremium
     */
    public function setAddedBy($addedBy)
    {
        $this->added_by = $addedBy;

        return $this;
    }

    /**
     * Get added_by
     *
     * @return string 
     */
    public function getAddedBy()
    {
        return $this->added_by;
    }

    /**
     * Set modified_by
     *
     * @param string $modifiedBy
     * @return UAccountPremium
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modified_by = $modifiedBy;

        return $this;
    }

    /**
     * Get modified_by
     *
     * @return string 
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return UAccountPremium
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
     * @return UAccountPremium
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
     * Set User
     *
     * @param \Entity\Bizj\UAccount $user
     * @return UAccountPremium
     */
    public function setUser(\Entity\Bizj\UAccount $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \Entity\Bizj\UAccount 
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Set Market
     *
     * @param \Entity\Bizj\Market $market
     * @return UAccountPremium
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
     * Set UAccount
     *
     * @param \Entity\Bizj\UAccount $uAccount
     * @return UAccountPremium
     */
    public function setUAccount(\Entity\Bizj\UAccount $uAccount = null)
    {
        $this->UAccount = $uAccount;

        return $this;
    }

    /**
     * Get UAccount
     *
     * @return \Entity\Bizj\UAccount 
     */
    public function getUAccount()
    {
        return $this->UAccount;
    }
}
