<?php

namespace Entity\NascarIllustrated;

/**
 * Cart
 */
class Cart extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $cart_id;

    /**
     * @var string
     */
    private $cart_hash;

    /**
     * @var string
     */
    private $shipping_destination = 'domestic';

    /**
     * @var string
     */
    private $ip_address = '127.0.0.1';

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
    private $CartItems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->CartItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cartHash
     *
     * @param string $cartHash
     *
     * @return Cart
     */
    public function setCartHash($cartHash)
    {
        $this->cart_hash = $cartHash;

        return $this;
    }

    /**
     * Get cartHash
     *
     * @return string
     */
    public function getCartHash()
    {
        return $this->cart_hash;
    }

    /**
     * Set shippingDestination
     *
     * @param string $shippingDestination
     *
     * @return Cart
     */
    public function setShippingDestination($shippingDestination)
    {
        $this->shipping_destination = $shippingDestination;

        return $this;
    }

    /**
     * Get shippingDestination
     *
     * @return string
     */
    public function getShippingDestination()
    {
        return $this->shipping_destination;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return Cart
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cart
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
     * @return Cart
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
     * Add cartItem
     *
     * @param \Entity\NascarIllustrated\CartItem $cartItem
     *
     * @return Cart
     */
    public function addCartItem(\Entity\NascarIllustrated\CartItem $cartItem)
    {
        $this->CartItems[] = $cartItem;

        return $this;
    }

    /**
     * Remove cartItem
     *
     * @param \Entity\NascarIllustrated\CartItem $cartItem
     */
    public function removeCartItem(\Entity\NascarIllustrated\CartItem $cartItem)
    {
        $this->CartItems->removeElement($cartItem);
    }

    /**
     * Get cartItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartItems()
    {
        return $this->CartItems;
    }
}

