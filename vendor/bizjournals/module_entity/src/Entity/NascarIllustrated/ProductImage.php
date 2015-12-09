<?php

namespace Entity\NascarIllustrated;

/**
 * ProductImage
 */
class ProductImage extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $product_image_id;

    /**
     * @var integer
     */
    private $product_id = 0;

    /**
     * @var string
     */
    private $image_type = 'other';

    /**
     * @var integer
     */
    private $media_id = 0;

    /**
     * @var string
     */
    private $media_url;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\NascarIllustrated\Product
     */
    private $Product;


    /**
     * Get productImageId
     *
     * @return integer
     */
    public function getProductImageId()
    {
        return $this->product_image_id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductImage
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
     * Set imageType
     *
     * @param string $imageType
     *
     * @return ProductImage
     */
    public function setImageType($imageType)
    {
        $this->image_type = $imageType;

        return $this;
    }

    /**
     * Get imageType
     *
     * @return string
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return ProductImage
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
    }

    /**
     * Get mediaId
     *
     * @return integer
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set mediaUrl
     *
     * @param string $mediaUrl
     *
     * @return ProductImage
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->media_url = $mediaUrl;

        return $this;
    }

    /**
     * Get mediaUrl
     *
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->media_url;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return ProductImage
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProductImage
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
     * @return ProductImage
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
     * Set product
     *
     * @param \Entity\NascarIllustrated\Product $product
     *
     * @return ProductImage
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

