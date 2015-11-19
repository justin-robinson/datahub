<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Set page_id
     *
     * @param integer $pageId
     * @return PageNational
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PageNational
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
}