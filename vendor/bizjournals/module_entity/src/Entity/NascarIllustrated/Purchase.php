<?php

namespace Entity\NascarIllustrated;

/**
 * Purchase
 */
class Purchase extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $purchase_id;

    /**
     * @var boolean
     */
    private $is_complete = false;

    /**
     * @var string
     */
    private $merchandise_batch_file;

    /**
     * @var string
     */
    private $subscription_batch_file;

    /**
     * @var integer
     */
    private $cart_id;

    /**
     * @var integer
     */
    private $amount = 0;

    /**
     * @var string
     */
    private $first_name = '';

    /**
     * @var string
     */
    private $last_name = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $phone = '';

    /**
     * @var string
     */
    private $address1 = '';

    /**
     * @var string
     */
    private $address2 = '';

    /**
     * @var string
     */
    private $city = '';

    /**
     * @var string
     */
    private $state_province = '';

    /**
     * @var string
     */
    private $postal_code = '';

    /**
     * @var string
     */
    private $country = '';

    /**
     * @var boolean
     */
    private $has_billing_eq_shipping = true;

    /**
     * @var string
     */
    private $transaction_code;

    /**
     * @var string
     */
    private $transaction_metadata;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $PurchaseItems;

    /**
     * @var \Entity\NascarIllustrated\Cart
     */
    private $Cart;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->PurchaseItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get purchaseId
     *
     * @return integer
     */
    public function getPurchaseId()
    {
        return $this->purchase_id;
    }

    /**
     * Set isComplete
     *
     * @param boolean $isComplete
     *
     * @return Purchase
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get isComplete
     *
     * @return boolean
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set merchandiseBatchFile
     *
     * @param string $merchandiseBatchFile
     *
     * @return Purchase
     */
    public function setMerchandiseBatchFile($merchandiseBatchFile)
    {
        $this->merchandise_batch_file = $merchandiseBatchFile;

        return $this;
    }

    /**
     * Get merchandiseBatchFile
     *
     * @return string
     */
    public function getMerchandiseBatchFile()
    {
        return $this->merchandise_batch_file;
    }

    /**
     * Set subscriptionBatchFile
     *
     * @param string $subscriptionBatchFile
     *
     * @return Purchase
     */
    public function setSubscriptionBatchFile($subscriptionBatchFile)
    {
        $this->subscription_batch_file = $subscriptionBatchFile;

        return $this;
    }

    /**
     * Get subscriptionBatchFile
     *
     * @return string
     */
    public function getSubscriptionBatchFile()
    {
        return $this->subscription_batch_file;
    }

    /**
     * Set cartId
     *
     * @param integer $cartId
     *
     * @return Purchase
     */
    public function setCartId($cartId)
    {
        $this->cart_id = $cartId;

        return $this;
    }

    /**
     * Get cartId
     *
     * @return integer
     */
    public function getCartId()
    {
        return $this->cart_id;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Purchase
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Purchase
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Purchase
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Purchase
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Purchase
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Purchase
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Purchase
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Purchase
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     *
     * @return Purchase
     */
    public function setStateProvince($stateProvince)
    {
        $this->state_province = $stateProvince;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string
     */
    public function getStateProvince()
    {
        return $this->state_province;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Purchase
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Purchase
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

    /**
     * Set hasBillingEqShipping
     *
     * @param boolean $hasBillingEqShipping
     *
     * @return Purchase
     */
    public function setHasBillingEqShipping($hasBillingEqShipping)
    {
        $this->has_billing_eq_shipping = $hasBillingEqShipping;

        return $this;
    }

    /**
     * Get hasBillingEqShipping
     *
     * @return boolean
     */
    public function getHasBillingEqShipping()
    {
        return $this->has_billing_eq_shipping;
    }

    /**
     * Set transactionCode
     *
     * @param string $transactionCode
     *
     * @return Purchase
     */
    public function setTransactionCode($transactionCode)
    {
        $this->transaction_code = $transactionCode;

        return $this;
    }

    /**
     * Get transactionCode
     *
     * @return string
     */
    public function getTransactionCode()
    {
        return $this->transaction_code;
    }

    /**
     * Set transactionMetadata
     *
     * @param string $transactionMetadata
     *
     * @return Purchase
     */
    public function setTransactionMetadata($transactionMetadata)
    {
        $this->transaction_metadata = $transactionMetadata;

        return $this;
    }

    /**
     * Get transactionMetadata
     *
     * @return string
     */
    public function getTransactionMetadata()
    {
        return $this->transaction_metadata;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Purchase
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
     * @return Purchase
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
     * Add purchaseItem
     *
     * @param \Entity\NascarIllustrated\PurchaseItem $purchaseItem
     *
     * @return Purchase
     */
    public function addPurchaseItem(\Entity\NascarIllustrated\PurchaseItem $purchaseItem)
    {
        $this->PurchaseItems[] = $purchaseItem;

        return $this;
    }

    /**
     * Remove purchaseItem
     *
     * @param \Entity\NascarIllustrated\PurchaseItem $purchaseItem
     */
    public function removePurchaseItem(\Entity\NascarIllustrated\PurchaseItem $purchaseItem)
    {
        $this->PurchaseItems->removeElement($purchaseItem);
    }

    /**
     * Get purchaseItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPurchaseItems()
    {
        return $this->PurchaseItems;
    }

    /**
     * Set cart
     *
     * @param \Entity\NascarIllustrated\Cart $cart
     *
     * @return Purchase
     */
    public function setCart(\Entity\NascarIllustrated\Cart $cart = null)
    {
        $this->Cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Entity\NascarIllustrated\Cart
     */
    public function getCart()
    {
        return $this->Cart;
    }
}

