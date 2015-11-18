<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageCorrection
 */
class PageCorrection extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var string
     */
    private $market_code = 'bizjournals';

    /**
     * @var string
     */
    private $correction;

    /**
     * @var boolean
     */
    private $is_daily = false;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Bzjpreview\Page
     */
    private $Page;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageCorrection
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
     * Set market_code
     *
     * @param string $marketCode
     * @return PageCorrection
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set correction
     *
     * @param string $correction
     * @return PageCorrection
     */
    public function setCorrection($correction)
    {
        $this->correction = $correction;

        return $this;
    }

    /**
     * Get correction
     *
     * @return string 
     */
    public function getCorrection()
    {
        return $this->correction;
    }

    /**
     * Set is_daily
     *
     * @param boolean $isDaily
     * @return PageCorrection
     */
    public function setIsDaily($isDaily)
    {
        $this->is_daily = $isDaily;

        return $this;
    }

    /**
     * Get is_daily
     *
     * @return boolean 
     */
    public function getIsDaily()
    {
        return $this->is_daily;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PageCorrection
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
     * Set Page
     *
     * @param \Entity\Bzjpreview\Page $page
     * @return PageCorrection
     */
    public function setPage(\Entity\Bzjpreview\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get Page
     *
     * @return \Entity\Bzjpreview\Page 
     */
    public function getPage()
    {
        return $this->Page;
    }
}
