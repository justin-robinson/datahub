<?php

namespace Entity\NascarIllustrated;

/**
 * CartItem
 */
class CartItem extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $cart_id;

    /**
     * @var integer
     */
    private $item_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var integer
     */
    private $price = 0;

    /**
     * @var integer
     */
    private $quantity = 1;

    /**
     * @var \DateTime
     */
    private $added_time;

    /**
     * @var integer
     */
    private $tax = 0;

    /**
     * @var integer
     */
    private $parent_item_id = 0;

    /**
     * @var string
     */
    private $metadata;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\NascarIllustrated\Cart
     */
    private $Cart;

    /**
     * @var \Entity\NascarIllustrated\Product
     */
    private $Product;


    /**
     * Set cartId
     *
     * @param integer $cartId
     *
     * @return CartItem
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
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return CartItem
     */
    public function setItemId($itemId)
    {
        $this->item_id = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return CartItem
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
     * Set price
     *
     * @param integer $price
     *
     * @return CartItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return CartItem
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
     * Set addedTime
     *
     * @param \DateTime $addedTime
     *
     * @return CartItem
     */
    public function setAddedTime($addedTime)
    {
        $this->added_time = $addedTime;

        return $this;
    }

    /**
     * Get addedTime
     *
     * @return \DateTime
     */
    public function getAddedTime()
    {
        return $this->added_time;
    }

    /**
     * Set tax
     *
     * @param integer $tax
     *
     * @return CartItem
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return integer
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set parentItemId
     *
     * @param integer $parentItemId
     *
     * @return CartItem
     */
    public function setParentItemId($parentItemId)
    {
        $this->parent_item_id = $parentItemId;

        return $this;
    }

    /**
     * Get parentItemId
     *
     * @return integer
     */
    public function getParentItemId()
    {
        return $this->parent_item_id;
    }

    /**
     * Set metadata
     *
     * @param string $metadata
     *
     * @return CartItem
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get metadata
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CartItem
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
     * @return CartItem
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
     * Set cart
     *
     * @param \Entity\NascarIllustrated\Cart $cart
     *
     * @return CartItem
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

    /**
     * Set product
     *
     * @param \Entity\NascarIllustrated\Product $product
     *
     * @return CartItem
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

