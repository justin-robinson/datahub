<?php

namespace Entity\NascarIllustrated;

use Doctrine\ORM\Mapping as ORM;

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
     * Get product_image_id
     *
     * @return integer 
     */
    public function getProductImageId()
    {
        return $this->product_image_id;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return ProductImage
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
     * Set image_type
     *
     * @param string $imageType
     * @return ProductImage
     */
    public function setImageType($imageType)
    {
        $this->image_type = $imageType;

        return $this;
    }

    /**
     * Get image_type
     *
     * @return string 
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return ProductImage
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
    }

    /**
     * Get media_id
     *
     * @return integer 
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set media_url
     *
     * @param string $mediaUrl
     * @return ProductImage
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->media_url = $mediaUrl;

        return $this;
    }

    /**
     * Get media_url
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ProductImage
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
     * @return ProductImage
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
     * Set Product
     *
     * @param \Entity\NascarIllustrated\Product $product
     * @return ProductImage
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
