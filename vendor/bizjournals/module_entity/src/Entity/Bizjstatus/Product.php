<?php

namespace Entity\Bizjstatus;

/**
 * Product
 */
class Product extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var string
     */
    private $product_url;

    /**
     * @var boolean
     */
    private $is_active = true;

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
    private $Events;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Messages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Set productUrl
     *
     * @param string $productUrl
     *
     * @return Product
     */
    public function setProductUrl($productUrl)
    {
        $this->product_url = $productUrl;

        return $this;
    }

    /**
     * Get productUrl
     *
     * @return string
     */
    public function getProductUrl()
    {
        return $this->product_url;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
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
     * @return Product
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
     * Add event
     *
     * @param \Entity\Bizjstatus\ProductEventMap $event
     *
     * @return Product
     */
    public function addEvent(\Entity\Bizjstatus\ProductEventMap $event)
    {
        $this->Events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Entity\Bizjstatus\ProductEventMap $event
     */
    public function removeEvent(\Entity\Bizjstatus\ProductEventMap $event)
    {
        $this->Events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->Events;
    }

    /**
     * Add message
     *
     * @param \Entity\Bizjstatus\ProductInfoMessageMap $message
     *
     * @return Product
     */
    public function addMessage(\Entity\Bizjstatus\ProductInfoMessageMap $message)
    {
        $this->Messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Entity\Bizjstatus\ProductInfoMessageMap $message
     */
    public function removeMessage(\Entity\Bizjstatus\ProductInfoMessageMap $message)
    {
        $this->Messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->Messages;
    }
}

