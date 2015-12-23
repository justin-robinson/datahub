<?php

namespace Entity\Bizj;

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
     * Get siteId
     *
     * @return integer
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set siteHost
     *
     * @param string $siteHost
     *
     * @return Site
     */
    public function setSiteHost($siteHost)
    {
        $this->site_host = $siteHost;

        return $this;
    }

    /**
     * Get siteHost
     *
     * @return string
     */
    public function getSiteHost()
    {
        return $this->site_host;
    }

    /**
     * Set siteName
     *
     * @param string $siteName
     *
     * @return Site
     */
    public function setSiteName($siteName)
    {
        $this->site_name = $siteName;

        return $this;
    }

    /**
     * Get siteName
     *
     * @return string
     */
    public function getSiteName()
    {
        return $this->site_name;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return Site
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Site
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
     * @return Site
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
     * Add section
     *
     * @param \Entity\Bizj\SiteSection $section
     *
     * @return Site
     */
    public function addSection(\Entity\Bizj\SiteSection $section)
    {
        $this->Sections[] = $section;

        return $this;
    }

    /**
     * Remove section
     *
     * @param \Entity\Bizj\SiteSection $section
     */
    public function removeSection(\Entity\Bizj\SiteSection $section)
    {
        $this->Sections->removeElement($section);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSections()
    {
        return $this->Sections;
    }
}

