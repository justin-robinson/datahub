<?php

namespace Entity\Bizj;

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
     * Get metaId
     *
     * @return integer
     */
    public function getMetaId()
    {
        return $this->meta_id;
    }

    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageMetadata
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get pageId
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
     *
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
     * Set metaName
     *
     * @param string $metaName
     *
     * @return PageMetadata
     */
    public function setMetaName($metaName)
    {
        $this->meta_name = $metaName;

        return $this;
    }

    /**
     * Get metaName
     *
     * @return string
     */
    public function getMetaName()
    {
        return $this->meta_name;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     *
     * @return PageMetadata
     */
    public function setMetaValue($metaValue)
    {
        $this->meta_value = $metaValue;

        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string
     */
    public function getMetaValue()
    {
        return $this->meta_value;
    }

    /**
     * Set page
     *
     * @param \Entity\Bizj\Page $page
     *
     * @return PageMetadata
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Entity\Bizj\Page
     */
    public function getPage()
    {
        return $this->Page;
    }
}

