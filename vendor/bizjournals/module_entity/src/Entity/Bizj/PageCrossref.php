<?php

namespace Entity\Bizj;

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
     * Get refId
     *
     * @return integer
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageCrossref
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
     * Set refType
     *
     * @param string $refType
     *
     * @return PageCrossref
     */
    public function setRefType($refType)
    {
        $this->ref_type = $refType;

        return $this;
    }

    /**
     * Get refType
     *
     * @return string
     */
    public function getRefType()
    {
        return $this->ref_type;
    }

    /**
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return PageCrossref
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
     * Set refKey
     *
     * @param string $refKey
     *
     * @return PageCrossref
     */
    public function setRefKey($refKey)
    {
        $this->ref_key = $refKey;

        return $this;
    }

    /**
     * Get refKey
     *
     * @return string
     */
    public function getRefKey()
    {
        return $this->ref_key;
    }

    /**
     * Set refValue
     *
     * @param string $refValue
     *
     * @return PageCrossref
     */
    public function setRefValue($refValue)
    {
        $this->ref_value = $refValue;

        return $this;
    }

    /**
     * Get refValue
     *
     * @return string
     */
    public function getRefValue()
    {
        return $this->ref_value;
    }

    /**
     * Set refWeight
     *
     * @param integer $refWeight
     *
     * @return PageCrossref
     */
    public function setRefWeight($refWeight)
    {
        $this->ref_weight = $refWeight;

        return $this;
    }

    /**
     * Get refWeight
     *
     * @return integer
     */
    public function getRefWeight()
    {
        return $this->ref_weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PageCrossref
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
     * @return PageCrossref
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
     * Set page
     *
     * @param \Entity\Bizj\Page $page
     *
     * @return PageCrossref
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

