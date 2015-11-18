<?php

namespace Entity\Bizjstatus;

use Doctrine\ORM\Mapping as ORM;

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
     * @return Product
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
     * Set product_url
     *
     * @param string $productUrl
     * @return Product
     */
    public function setProductUrl($productUrl)
    {
        $this->product_url = $productUrl;

        return $this;
    }

    /**
     * Get product_url
     *
     * @return string 
     */
    public function getProductUrl()
    {
        return $this->product_url;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @return Product
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
     * Add Events
     *
     * @param \Entity\Bizjstatus\ProductEventMap $events
     * @return Product
     */
    public function addEvent(\Entity\Bizjstatus\ProductEventMap $events)
    {
        $this->Events[] = $events;

        return $this;
    }

    /**
     * Remove Events
     *
     * @param \Entity\Bizjstatus\ProductEventMap $events
     */
    public function removeEvent(\Entity\Bizjstatus\ProductEventMap $events)
    {
        $this->Events->removeElement($events);
    }

    /**
     * Get Events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->Events;
    }

    /**
     * Add Messages
     *
     * @param \Entity\Bizjstatus\ProductInfoMessageMap $messages
     * @return Product
     */
    public function addMessage(\Entity\Bizjstatus\ProductInfoMessageMap $messages)
    {
        $this->Messages[] = $messages;

        return $this;
    }

    /**
     * Remove Messages
     *
     * @param \Entity\Bizjstatus\ProductInfoMessageMap $messages
     */
    public function removeMessage(\Entity\Bizjstatus\ProductInfoMessageMap $messages)
    {
        $this->Messages->removeElement($messages);
    }

    /**
     * Get Messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->Messages;
    }
}
