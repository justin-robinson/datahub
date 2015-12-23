<?php

namespace Entity\NascarIllustrated;

/**
 * PurchaseItem
 */
class PurchaseItem extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $purchase_id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var boolean
     */
    private $is_subscription = false;

    /**
     * @var string
     */
    private $key_code;

    /**
     * @var integer
     */
    private $quantity = 1;

    /**
     * @var integer
     */
    private $unit_price = 0;

    /**
     * @var integer
     */
    private $unit_shipping = 0;

    /**
     * @var string
     */
    private $item_metadata;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\NascarIllustrated\Purchase
     */
    private $Purchase;

    /**
     * @var \Entity\NascarIllustrated\Product
     */
    private $Product;


    /**
     * Set purchaseId
     *
     * @param integer $purchaseId
     *
     * @return PurchaseItem
     */
    public function setPurchaseId($purchaseId)
    {
        $this->purchase_id = $purchaseId;

        return $this;
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
     * Set productId
     *
     * @param integer $productId
     *
     * @return PurchaseItem
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return PurchaseItem
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set isSubscription
     *
     * @param boolean $isSubscription
     *
     * @return PurchaseItem
     */
    public function setIsSubscription($isSubscription)
    {
        $this->is_subscription = $isSubscription;

        return $this;
    }

    /**
     * Get isSubscription
     *
     * @return boolean
     */
    public function getIsSubscription()
    {
        return $this->is_subscription;
    }

    /**
     * Set keyCode
     *
     * @param string $keyCode
     *
     * @return PurchaseItem
     */
    public function setKeyCode($keyCode)
    {
        $this->key_code = $keyCode;

        return $this;
    }

    /**
     * Get keyCode
     *
     * @return string
     */
    public function getKeyCode()
    {
        return $this->key_code;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return PurchaseItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitPrice
     *
     * @param integer $unitPrice
     *
     * @return PurchaseItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unit_price = $unitPrice;

        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return integer
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Set unitShipping
     *
     * @param integer $unitShipping
     *
     * @return PurchaseItem
     */
    public function setUnitShipping($unitShipping)
    {
        $this->unit_shipping = $unitShipping;

        return $this;
    }

    /**
     * Get unitShipping
     *
     * @return integer
     */
    public function getUnitShipping()
    {
        return $this->unit_shipping;
    }

    /**
     * Set itemMetadata
     *
     * @param string $itemMetadata
     *
     * @return PurchaseItem
     */
    public function setItemMetadata($itemMetadata)
    {
        $this->item_metadata = $itemMetadata;

        return $this;
    }

    /**
     * Get itemMetadata
     *
     * @return string
     */
    public function getItemMetadata()
    {
        return $this->item_metadata;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PurchaseItem
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
     * @return PurchaseItem
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
     * Set purchase
     *
     * @param \Entity\NascarIllustrated\Purchase $purchase
     *
     * @return PurchaseItem
     */
    public function setPurchase(\Entity\NascarIllustrated\Purchase $purchase = null)
    {
        $this->Purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     * @return \Entity\NascarIllustrated\Purchase
     */
    public function getPurchase()
    {
        return $this->Purchase;
    }

    /**
     * Set product
     *
     * @param \Entity\NascarIllustrated\Product $product
     *
     * @return PurchaseItem
     */
    public function setProduct(\Entity\NascarIllustrated\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Entity\NascarIllustrated\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }
}

