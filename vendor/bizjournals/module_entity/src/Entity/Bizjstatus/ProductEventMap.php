<?php

namespace Entity\Bizjstatus;

/**
 * ProductEventMap
 */
class ProductEventMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizjstatus\Event
     */
    private $Event;

    /**
     * @var \Entity\Bizjstatus\Product
     */
    private $Product;


    /**
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return ProductEventMap
     */
    public function setEventId($eventId)
    {
        $this->event_id = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductEventMap
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProductEventMap
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
     * @return ProductEventMap
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
     * Set event
     *
     * @param \Entity\Bizjstatus\Event $event
     *
     * @return ProductEventMap
     */
    public function setEvent(\Entity\Bizjstatus\Event $event = null)
    {
        $this->Event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Entity\Bizjstatus\Event
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * Set product
     *
     * @param \Entity\Bizjstatus\Product $product
     *
     * @return ProductEventMap
     */
    public function setProduct(\Entity\Bizjstatus\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Entity\Bizjstatus\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }
}

