<?php

namespace Entity\NascarIllustrated;

/**
 * ProductCategory
 */
class ProductCategory extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $category_id;

    /**
     * @var string
     */
    private $category_name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var integer
     */
    private $ord = 0;

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
    private $can_group_by_year = false;

    /**
     * @var integer
     */
    private $group_id;

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
    private $Products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return ProductCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ProductCategory
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
     * Set ord
     *
     * @param integer $ord
     *
     * @return ProductCategory
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Set canGroupByYear
     *
     * @param boolean $canGroupByYear
     *
     * @return ProductCategory
     */
    public function setCanGroupByYear($canGroupByYear)
    {
        $this->can_group_by_year = $canGroupByYear;

        return $this;
    }

    /**
     * Get canGroupByYear
     *
     * @return boolean
     */
    public function getCanGroupByYear()
    {
        return $this->can_group_by_year;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return ProductCategory
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Add product
     *
     * @param \Entity\NascarIllustrated\Product $product
     *
     * @return ProductCategory
     */
    public function addProduct(\Entity\NascarIllustrated\Product $product)
    {
        $this->Products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Entity\NascarIllustrated\Product $product
     */
    public function removeProduct(\Entity\NascarIllustrated\Product $product)
    {
        $this->Products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->Products;
    }
}

