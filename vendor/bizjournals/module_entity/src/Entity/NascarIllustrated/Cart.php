<?php

namespace Entity\NascarIllustrated;

use Doctrine\ORM\Mapping as ORM;

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
     * Get cart_id
     *
     * @return integer 
     */
    public function getCartId()
    {
        return $this->cart_id;
    }

    /**
     * Set cart_hash
     *
     * @param string $cartHash
     * @return Cart
     */
    public function setCartHash($cartHash)
    {
        $this->cart_hash = $cartHash;

        return $this;
    }

    /**
     * Get cart_hash
     *
     * @return string 
     */
    public function getCartHash()
    {
        return $this->cart_hash;
    }

    /**
     * Set shipping_destination
     *
     * @param string $shippingDestination
     * @return Cart
     */
    public function setShippingDestination($shippingDestination)
    {
        $this->shipping_destination = $shippingDestination;

        return $this;
    }

    /**
     * Get shipping_destination
     *
     * @return string 
     */
    public function getShippingDestination()
    {
        return $this->shipping_destination;
    }

    /**
     * Set ip_address
     *
     * @param string $ipAddress
     * @return Cart
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Cart
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
     * @return Cart
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
     * Add CartItems
     *
     * @param \Entity\NascarIllustrated\CartItem $cartItems
     * @return Cart
     */
    public function addCartItem(\Entity\NascarIllustrated\CartItem $cartItems)
    {
        $this->CartItems[] = $cartItems;

        return $this;
    }

    /**
     * Remove CartItems
     *
     * @param \Entity\NascarIllustrated\CartItem $cartItems
     */
    public function removeCartItem(\Entity\NascarIllustrated\CartItem $cartItems)
    {
        $this->CartItems->removeElement($cartItems);
    }

    /**
     * Get CartItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCartItems()
    {
        return $this->CartItems;
    }
}
