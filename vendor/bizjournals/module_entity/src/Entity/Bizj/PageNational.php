<?php

namespace Entity\Bizj;

/**
 * PageNational
 */
class PageNational extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var \DateTime
     */
    private $created_at;


    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageNational
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PageNational
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
}

