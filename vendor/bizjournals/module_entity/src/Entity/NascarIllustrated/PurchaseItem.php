<?php

namespace Entity\NascarIllustrated;

use Doctrine\ORM\Mapping as ORM;

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
     * Set purchase_id
     *
     * @param integer $purchaseId
     * @return PurchaseItem
     */
    public function setPurchaseId($purchaseId)
    {
        $this->purchase_id = $purchaseId;

        return $this;
    }

    /**
     * Get purchase_id
     *
     * @return integer 
     */
    public function getPurchaseId()
    {
        return $this->purchase_id;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return PurchaseItem
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get product_id
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set product_name
     *
     * @param string $productName
     * @return PurchaseItem
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;

        return $this;
    }

    /**
     * Get product_name
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set is_subscription
     *
     * @param boolean $isSubscription
     * @return PurchaseItem
     */
    public function setIsSubscription($isSubscription)
    {
        $this->is_subscription = $isSubscription;

        return $this;
    }

    /**
     * Get is_subscription
     *
     * @return boolean 
     */
    public function getIsSubscription()
    {
        return $this->is_subscription;
    }

    /**
     * Set key_code
     *
     * @param string $keyCode
     * @return PurchaseItem
     */
    public function setKeyCode($keyCode)
    {
        $this->key_code = $keyCode;

        return $this;
    }

    /**
     * Get key_code
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
     * Set unit_price
     *
     * @param integer $unitPrice
     * @return PurchaseItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unit_price = $unitPrice;

        return $this;
    }

    /**
     * Get unit_price
     *
     * @return integer 
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Set unit_shipping
     *
     * @param integer $unitShipping
     * @return PurchaseItem
     */
    public function setUnitShipping($unitShipping)
    {
        $this->unit_shipping = $unitShipping;

        return $this;
    }

    /**
     * Get unit_shipping
     *
     * @return integer 
     */
    public function getUnitShipping()
    {
        return $this->unit_shipping;
    }

    /**
     * Set item_metadata
     *
     * @param string $itemMetadata
     * @return PurchaseItem
     */
    public function setItemMetadata($itemMetadata)
    {
        $this->item_metadata = $itemMetadata;

        return $this;
    }

    /**
     * Get item_metadata
     *
     * @return string 
     */
    public function getItemMetadata()
    {
        return $this->item_metadata;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PurchaseItem
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
     * @return PurchaseItem
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
     * Set Purchase
     *
     * @param \Entity\NascarIllustrated\Purchase $purchase
     * @return PurchaseItem
     */
    public function setPurchase(\Entity\NascarIllustrated\Purchase $purchase = null)
    {
        $this->Purchase = $purchase;

        return $this;
    }

    /**
     * Get Purchase
     *
     * @return \Entity\NascarIllustrated\Purchase 
     */
    public function getPurchase()
    {
        return $this->Purchase;
    }

    /**
     * Set Product
     *
     * @param \Entity\NascarIllustrated\Product $product
     * @return PurchaseItem
     */
    public function setProduct(\Entity\NascarIllustrated\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \Entity\NascarIllustrated\Product 
     */
    public function getProduct()
    {
        return $this->Product;
    }
}
