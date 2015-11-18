<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageCrossref
 */
class PageCrossref extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $ref_id;

    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var string
     */
    private $ref_type;

    /**
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var string
     */
    private $ref_key;

    /**
     * @var string
     */
    private $ref_value;

    /**
     * @var integer
     */
    private $ref_weight;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizj\Page
     */
    private $Page;


    /**
     * Get ref_id
     *
     * @return integer 
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageCrossref
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
     * Set ref_type
     *
     * @param string $refType
     * @return PageCrossref
     */
    public function setRefType($refType)
    {
        $this->ref_type = $refType;

        return $this;
    }

    /**
     * Get ref_type
     *
     * @return string 
     */
    public function getRefType()
    {
        return $this->ref_type;
    }

    /**
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return PageCrossref
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
     * Set ref_key
     *
     * @param string $refKey
     * @return PageCrossref
     */
    public function setRefKey($refKey)
    {
        $this->ref_key = $refKey;

        return $this;
    }

    /**
     * Get ref_key
     *
     * @return string 
     */
    public function getRefKey()
    {
        return $this->ref_key;
    }

    /**
     * Set ref_value
     *
     * @param string $refValue
     * @return PageCrossref
     */
    public function setRefValue($refValue)
    {
        $this->ref_value = $refValue;

        return $this;
    }

    /**
     * Get ref_value
     *
     * @return string 
     */
    public function getRefValue()
    {
        return $this->ref_value;
    }

    /**
     * Set ref_weight
     *
     * @param integer $refWeight
     * @return PageCrossref
     */
    public function setRefWeight($refWeight)
    {
        $this->ref_weight = $refWeight;

        return $this;
    }

    /**
     * Get ref_weight
     *
     * @return integer 
     */
    public function getRefWeight()
    {
        return $this->ref_weight;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PageCrossref
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
     * @return PageCrossref
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
     * Set Page
     *
     * @param \Entity\Bizj\Page $page
     * @return PageCrossref
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
