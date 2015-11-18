<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 */
class Site extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $site_id;

    /**
     * @var string
     */
    private $site_host;

    /**
     * @var string
     */
    private $site_name;

    /**
     * @var string
     */
    private $product_name = 'The Business Journals';

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
    private $Sections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Sections = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get site_id
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set site_host
     *
     * @param string $siteHost
     * @return Site
     */
    public function setSiteHost($siteHost)
    {
        $this->site_host = $siteHost;

        return $this;
    }

    /**
     * Get site_host
     *
     * @return string 
     */
    public function getSiteHost()
    {
        return $this->site_host;
    }

    /**
     * Set site_name
     *
     * @param string $siteName
     * @return Site
     */
    public function setSiteName($siteName)
    {
        $this->site_name = $siteName;

        return $this;
    }

    /**
     * Get site_name
     *
     * @return string 
     */
    public function getSiteName()
    {
        return $this->site_name;
    }

    /**
     * Set product_name
     *
     * @param string $productName
     * @return Site
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Site
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
     * @return Site
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
     * Add Sections
     *
     * @param \Entity\Bizj\SiteSection $sections
     * @return Site
     */
    public function addSection(\Entity\Bizj\SiteSection $sections)
    {
        $this->Sections[] = $sections;

        return $this;
    }

    /**
     * Remove Sections
     *
     * @param \Entity\Bizj\SiteSection $sections
     */
    public function removeSection(\Entity\Bizj\SiteSection $sections)
    {
        $this->Sections->removeElement($sections);
    }

    /**
     * Get Sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->Sections;
    }
}
