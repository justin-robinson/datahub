<?php

namespace Entity\NascarIllustrated;

use Doctrine\ORM\Mapping as ORM;

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
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set category_name
     *
     * @param string $categoryName
     * @return ProductCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get category_name
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Set can_group_by_year
     *
     * @param boolean $canGroupByYear
     * @return ProductCategory
     */
    public function setCanGroupByYear($canGroupByYear)
    {
        $this->can_group_by_year = $canGroupByYear;

        return $this;
    }

    /**
     * Get can_group_by_year
     *
     * @return boolean 
     */
    public function getCanGroupByYear()
    {
        return $this->can_group_by_year;
    }

    /**
     * Set group_id
     *
     * @param integer $groupId
     * @return ProductCategory
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Add Products
     *
     * @param \Entity\NascarIllustrated\Product $products
     * @return ProductCategory
     */
    public function addProduct(\Entity\NascarIllustrated\Product $products)
    {
        $this->Products[] = $products;

        return $this;
    }

    /**
     * Remove Products
     *
     * @param \Entity\NascarIllustrated\Product $products
     */
    public function removeProduct(\Entity\NascarIllustrated\Product $products)
    {
        $this->Products->removeElement($products);
    }

    /**
     * Get Products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->Products;
    }
}
