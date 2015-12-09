<?php

namespace Entity\NascarIllustrated;

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
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set skuCode
     *
     * @param string $skuCode
     *
     * @return Product
     */
    public function setSkuCode($skuCode)
    {
        $this->sku_code = $skuCode;

        return $this;
    }

    /**
     * Get skuCode
     *
     * @return string
     */
    public function getSkuCode()
    {
        return $this->sku_code;
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
     * Set slug
     *
     * @param string $slug
     *
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
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return Product
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;

        return $this;
    }

    /**
     * Get issueDate
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
     *
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
     *
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
     * Set isHidden
     *
     * @param boolean $isHidden
     *
     * @return Product
     */
    public function setIsHidden($isHidden)
    {
        $this->is_hidden = $isHidden;

        return $this;
    }

    /**
     * Get isHidden
     *
     * @return boolean
     */
    public function getIsHidden()
    {
        return $this->is_hidden;
    }

    /**
     * Set isSubscription
     *
     * @param boolean $isSubscription
     *
     * @return Product
     */
    public function setIsSubscription($isSubscription)
    {
        $this->is_subscription = $isSubscription;

        return $this;
    }

    /**
     * Get isSubscription
     *
     * @return boolean
     */
    public function getIsSubscription()
    {
        return $this->is_subscription;
    }

    /**
     * Set keyCode
     *
     * @param string $keyCode
     *
     * @return Product
     */
    public function setKeyCode($keyCode)
    {
        $this->key_code = $keyCode;

        return $this;
    }

    /**
     * Get keyCode
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
     *
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
     * Set domesticRatecode
     *
     * @param string $domesticRatecode
     *
     * @return Product
     */
    public function setDomesticRatecode($domesticRatecode)
    {
        $this->domestic_ratecode = $domesticRatecode;

        return $this;
    }

    /**
     * Get domesticRatecode
     *
     * @return string
     */
    public function getDomesticRatecode()
    {
        return $this->domestic_ratecode;
    }

    /**
     * Set domesticCharge
     *
     * @param integer $domesticCharge
     *
     * @return Product
     */
    public function setDomesticCharge($domesticCharge)
    {
        $this->domestic_charge = $domesticCharge;

        return $this;
    }

    /**
     * Get domesticCharge
     *
     * @return integer
     */
    public function getDomesticCharge()
    {
        return $this->domestic_charge;
    }

    /**
     * Set caMxRatecode
     *
     * @param string $caMxRatecode
     *
     * @return Product
     */
    public function setCaMxRatecode($caMxRatecode)
    {
        $this->ca_mx_ratecode = $caMxRatecode;

        return $this;
    }

    /**
     * Get caMxRatecode
     *
     * @return string
     */
    public function getCaMxRatecode()
    {
        return $this->ca_mx_ratecode;
    }

    /**
     * Set caMxCharge
     *
     * @param integer $caMxCharge
     *
     * @return Product
     */
    public function setCaMxCharge($caMxCharge)
    {
        $this->ca_mx_charge = $caMxCharge;

        return $this;
    }

    /**
     * Get caMxCharge
     *
     * @return integer
     */
    public function getCaMxCharge()
    {
        return $this->ca_mx_charge;
    }

    /**
     * Set internationalRatecode
     *
     * @param string $internationalRatecode
     *
     * @return Product
     */
    public function setInternationalRatecode($internationalRatecode)
    {
        $this->international_ratecode = $internationalRatecode;

        return $this;
    }

    /**
     * Get internationalRatecode
     *
     * @return string
     */
    public function getInternationalRatecode()
    {
        return $this->international_ratecode;
    }

    /**
     * Set internationalCharge
     *
     * @param integer $internationalCharge
     *
     * @return Product
     */
    public function setInternationalCharge($internationalCharge)
    {
        $this->international_charge = $internationalCharge;

        return $this;
    }

    /**
     * Get internationalCharge
     *
     * @return integer
     */
    public function getInternationalCharge()
    {
        return $this->international_charge;
    }

    /**
     * Set originalIssueId
     *
     * @param integer $originalIssueId
     *
     * @return Product
     */
    public function setOriginalIssueId($originalIssueId)
    {
        $this->original_issue_id = $originalIssueId;

        return $this;
    }

    /**
     * Get originalIssueId
     *
     * @return integer
     */
    public function getOriginalIssueId()
    {
        return $this->original_issue_id;
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
     * Add image
     *
     * @param \Entity\NascarIllustrated\ProductImage $image
     *
     * @return Product
     */
    public function addImage(\Entity\NascarIllustrated\ProductImage $image)
    {
        $this->Images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Entity\NascarIllustrated\ProductImage $image
     */
    public function removeImage(\Entity\NascarIllustrated\ProductImage $image)
    {
        $this->Images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * Set category
     *
     * @param \Entity\NascarIllustrated\ProductCategory $category
     *
     * @return Product
     */
    public function setCategory(\Entity\NascarIllustrated\ProductCategory $category = null)
    {
        $this->Category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Entity\NascarIllustrated\ProductCategory
     */
    public function getCategory()
    {
        return $this->Category;
    }
}

