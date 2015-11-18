<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageMetadata
 */
class PageMetadata extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $meta_id;

    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $meta_name;

    /**
     * @var string
     */
    private $meta_value;

    /**
     * @var \Entity\Bizj\Page
     */
    private $Page;


    /**
     * Get meta_id
     *
     * @return integer 
     */
    public function getMetaId()
    {
        return $this->meta_id;
    }

    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageMetadata
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get page_id
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return PageMetadata
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
     * Set meta_name
     *
     * @param string $metaName
     * @return PageMetadata
     */
    public function setMetaName($metaName)
    {
        $this->meta_name = $metaName;

        return $this;
    }

    /**
     * Get meta_name
     *
     * @return string 
     */
    public function getMetaName()
    {
        return $this->meta_name;
    }

    /**
     * Set meta_value
     *
     * @param string $metaValue
     * @return PageMetadata
     */
    public function setMetaValue($metaValue)
    {
        $this->meta_value = $metaValue;

        return $this;
    }

    /**
     * Get meta_value
     *
     * @return string 
     */
    public function getMetaValue()
    {
        return $this->meta_value;
    }

    /**
     * Set Page
     *
     * @param \Entity\Bizj\Page $page
     * @return PageMetadata
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get Page
     *
     * @return \Entity\Bizj\Page 
     */
    public function getPage()
    {
        return $this->Page;
    }
}
