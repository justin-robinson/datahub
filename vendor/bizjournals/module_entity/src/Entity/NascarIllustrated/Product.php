<?php

namespace Entity\NascarIllustrated;

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
     * @var integer
     */
    private $category_id = 0;

    /**
     * @var string
     */
    private $sku_code;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var string
     */
    private $teaser;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var boolean
     */
    private $is_hidden = false;

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
    private $price = 0;

    /**
     * @var string
     */
    private $domestic_ratecode;

    /**
     * @var integer
     */
    private $domestic_charge = 0;

    /**
     * @var string
     */
    private $ca_mx_ratecode;

    /**
     * @var integer
     */
    private $ca_mx_charge = 0;

    /**
     * @var string
     */
    private $international_ratecode;

    /**
     * @var integer
     */
    private $international_charge = 0;

    /**
     * @var integer
     */
    private $original_issue_id;

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
    private $Images;

    /**
     * @var \Entity\NascarIllustrated\ProductCategory
     */
    private $Category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set category_id
     *
     * @param integer $categoryId
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set sku_code
     *
     * @param string $skuCode
     * @return Product
     */
    public function setSkuCode($skuCode)
    {
        $this->sku_code = $skuCode;

        return $this;
    }

    /**
     * Get sku_code
     *
     * @return string 
     */
    public function getSkuCode()
    {
        return $this->sku_code;
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
     * Set slug
     *
     * @param string $slug
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return Product
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;

        return $this;
    }

    /**
     * Get issue_date
     *
     * @return \DateTime 
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     * @return Product
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set is_hidden
     *
     * @param boolean $isHidden
     * @return Product
     */
    public function setIsHidden($isHidden)
    {
        $this->is_hidden = $isHidden;

        return $this;
    }

    /**
     * Get is_hidden
     *
     * @return boolean 
     */
    public function getIsHidden()
    {
        return $this->is_hidden;
    }

    /**
     * Set is_subscription
     *
     * @param boolean $isSubscription
     * @return Product
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
     * @return Product
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
     * Set price
     *
     * @param integer $price
     * @return Product
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
     * Set domestic_ratecode
     *
     * @param string $domesticRatecode
     * @return Product
     */
    public function setDomesticRatecode($domesticRatecode)
    {
        $this->domestic_ratecode = $domesticRatecode;

        return $this;
    }

    /**
     * Get domestic_ratecode
     *
     * @return string 
     */
    public function getDomesticRatecode()
    {
        return $this->domestic_ratecode;
    }

    /**
     * Set domestic_charge
     *
     * @param integer $domesticCharge
     * @return Product
     */
    public function setDomesticCharge($domesticCharge)
    {
        $this->domestic_charge = $domesticCharge;

        return $this;
    }

    /**
     * Get domestic_charge
     *
     * @return integer 
     */
    public function getDomesticCharge()
    {
        return $this->domestic_charge;
    }

    /**
     * Set ca_mx_ratecode
     *
     * @param string $caMxRatecode
     * @return Product
     */
    public function setCaMxRatecode($caMxRatecode)
    {
        $this->ca_mx_ratecode = $caMxRatecode;

        return $this;
    }

    /**
     * Get ca_mx_ratecode
     *
     * @return string 
     */
    public function getCaMxRatecode()
    {
        return $this->ca_mx_ratecode;
    }

    /**
     * Set ca_mx_charge
     *
     * @param integer $caMxCharge
     * @return Product
     */
    public function setCaMxCharge($caMxCharge)
    {
        $this->ca_mx_charge = $caMxCharge;

        return $this;
    }

    /**
     * Get ca_mx_charge
     *
     * @return integer 
     */
    public function getCaMxCharge()
    {
        return $this->ca_mx_charge;
    }

    /**
     * Set international_ratecode
     *
     * @param string $internationalRatecode
     * @return Product
     */
    public function setInternationalRatecode($internationalRatecode)
    {
        $this->international_ratecode = $internationalRatecode;

        return $this;
    }

    /**
     * Get international_ratecode
     *
     * @return string 
     */
    public function getInternationalRatecode()
    {
        return $this->international_ratecode;
    }

    /**
     * Set international_charge
     *
     * @param integer $internationalCharge
     * @return Product
     */
    public function setInternationalCharge($internationalCharge)
    {
        $this->international_charge = $internationalCharge;

        return $this;
    }

    /**
     * Get international_charge
     *
     * @return integer 
     */
    public function getInternationalCharge()
    {
        return $this->international_charge;
    }

    /**
     * Set original_issue_id
     *
     * @param integer $originalIssueId
     * @return Product
     */
    public function setOriginalIssueId($originalIssueId)
    {
        $this->original_issue_id = $originalIssueId;

        return $this;
    }

    /**
     * Get original_issue_id
     *
     * @return integer 
     */
    public function getOriginalIssueId()
    {
        return $this->original_issue_id;
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
     * Add Images
     *
     * @param \Entity\NascarIllustrated\ProductImage $images
     * @return Product
     */
    public function addImage(\Entity\NascarIllustrated\ProductImage $images)
    {
        $this->Images[] = $images;

        return $this;
    }

    /**
     * Remove Images
     *
     * @param \Entity\NascarIllustrated\ProductImage $images
     */
    public function removeImage(\Entity\NascarIllustrated\ProductImage $images)
    {
        $this->Images->removeElement($images);
    }

    /**
     * Get Images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * Set Category
     *
     * @param \Entity\NascarIllustrated\ProductCategory $category
     * @return Product
     */
    public function setCategory(\Entity\NascarIllustrated\ProductCategory $category = null)
    {
        $this->Category = $category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return \Entity\NascarIllustrated\ProductCategory 
     */
    public function getCategory()
    {
        return $this->Category;
    }
}
