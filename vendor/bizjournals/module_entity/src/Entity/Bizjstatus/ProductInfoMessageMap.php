<?php

namespace Entity\Bizjstatus;

/**
 * ProductInfoMessageMap
 */
class ProductInfoMessageMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $message_id;

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
     * @var \Entity\Bizjstatus\InfoMessage
     */
    private $Event;

    /**
     * @var \Entity\Bizjstatus\Product
     */
    private $Product;


    /**
     * Set messageId
     *
     * @param integer $messageId
     *
     * @return ProductInfoMessageMap
     */
    public function setMessageId($messageId)
    {
        $this->message_id = $messageId;

        return $this;
    }

    /**
     * Get messageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductInfoMessageMap
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
     * @return ProductInfoMessageMap
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
     * @return ProductInfoMessageMap
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
     * @param \Entity\Bizjstatus\InfoMessage $event
     *
     * @return ProductInfoMessageMap
     */
    public function setEvent(\Entity\Bizjstatus\InfoMessage $event = null)
    {
        $this->Event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Entity\Bizjstatus\InfoMessage
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
     * @return ProductInfoMessageMap
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

