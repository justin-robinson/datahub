<?php

namespace Entity\Bizj;

/**
 * Journal
 */
class Journal extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $journal_id;

    /**
     * @var string
     */
    private $journal_code;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var string
     */
    private $journal_name;

    /**
     * @var string
     */
    private $descriptive_name;

    /**
     * @var string
     */
    private $short_name;

    /**
     * @var string
     */
    private $objective_name;

    /**
     * @var string
     */
    private $objective_short_name;

    /**
     * @var integer
     */
    private $print_product_id;

    /**
     * @var integer
     */
    private $online_product_id;

    /**
     * @var integer
     */
    private $primary_contact_id;

    /**
     * @var integer
     */
    private $publisher_contact_id;

    /**
     * @var integer
     */
    private $circ_mgr_contact_id;

    /**
     * @var integer
     */
    private $ad_mgr_contact_id;

    /**
     * @var integer
     */
    private $editor_contact_id;

    /**
     * @var integer
     */
    private $research_dir_contact_id;

    /**
     * @var string
     */
    private $circ_product_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;


    /**
     * Get journalId
     *
     * @return integer
     */
    public function getJournalId()
    {
        return $this->journal_id;
    }

    /**
     * Set journalCode
     *
     * @param string $journalCode
     *
     * @return Journal
     */
    public function setJournalCode($journalCode)
    {
        $this->journal_code = $journalCode;

        return $this;
    }

    /**
     * Get journalCode
     *
     * @return string
     */
    public function getJournalCode()
    {
        return $this->journal_code;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return Journal
     */
    public function setMarketId($marketId)
    {
        $this->market_id = $marketId;

        return $this;
    }

    /**
     * Get marketId
     *
     * @return integer
     */
    public function getMarketId()
    {
        return $this->market_id;
    }

    /**
     * Set journalName
     *
     * @param string $journalName
     *
     * @return Journal
     */
    public function setJournalName($journalName)
    {
        $this->journal_name = $journalName;

        return $this;
    }

    /**
     * Get journalName
     *
     * @return string
     */
    public function getJournalName()
    {
        return $this->journal_name;
    }

    /**
     * Set descriptiveName
     *
     * @param string $descriptiveName
     *
     * @return Journal
     */
    public function setDescriptiveName($descriptiveName)
    {
        $this->descriptive_name = $descriptiveName;

        return $this;
    }

    /**
     * Get descriptiveName
     *
     * @return string
     */
    public function getDescriptiveName()
    {
        return $this->descriptive_name;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Journal
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set objectiveName
     *
     * @param string $objectiveName
     *
     * @return Journal
     */
    public function setObjectiveName($objectiveName)
    {
        $this->objective_name = $objectiveName;

        return $this;
    }

    /**
     * Get objectiveName
     *
     * @return string
     */
    public function getObjectiveName()
    {
        return $this->objective_name;
    }

    /**
     * Set objectiveShortName
     *
     * @param string $objectiveShortName
     *
     * @return Journal
     */
    public function setObjectiveShortName($objectiveShortName)
    {
        $this->objective_short_name = $objectiveShortName;

        return $this;
    }

    /**
     * Get objectiveShortName
     *
     * @return string
     */
    public function getObjectiveShortName()
    {
        return $this->objective_short_name;
    }

    /**
     * Set printProductId
     *
     * @param integer $printProductId
     *
     * @return Journal
     */
    public function setPrintProductId($printProductId)
    {
        $this->print_product_id = $printProductId;

        return $this;
    }

    /**
     * Get printProductId
     *
     * @return integer
     */
    public function getPrintProductId()
    {
        return $this->print_product_id;
    }

    /**
     * Set onlineProductId
     *
     * @param integer $onlineProductId
     *
     * @return Journal
     */
    public function setOnlineProductId($onlineProductId)
    {
        $this->online_product_id = $onlineProductId;

        return $this;
    }

    /**
     * Get onlineProductId
     *
     * @return integer
     */
    public function getOnlineProductId()
    {
        return $this->online_product_id;
    }

    /**
     * Set primaryContactId
     *
     * @param integer $primaryContactId
     *
     * @return Journal
     */
    public function setPrimaryContactId($primaryContactId)
    {
        $this->primary_contact_id = $primaryContactId;

        return $this;
    }

    /**
     * Get primaryContactId
     *
     * @return integer
     */
    public function getPrimaryContactId()
    {
        return $this->primary_contact_id;
    }

    /**
     * Set publisherContactId
     *
     * @param integer $publisherContactId
     *
     * @return Journal
     */
    public function setPublisherContactId($publisherContactId)
    {
        $this->publisher_contact_id = $publisherContactId;

        return $this;
    }

    /**
     * Get publisherContactId
     *
     * @return integer
     */
    public function getPublisherContactId()
    {
        return $this->publisher_contact_id;
    }

    /**
     * Set circMgrContactId
     *
     * @param integer $circMgrContactId
     *
     * @return Journal
     */
    public function setCircMgrContactId($circMgrContactId)
    {
        $this->circ_mgr_contact_id = $circMgrContactId;

        return $this;
    }

    /**
     * Get circMgrContactId
     *
     * @return integer
     */
    public function getCircMgrContactId()
    {
        return $this->circ_mgr_contact_id;
    }

    /**
     * Set adMgrContactId
     *
     * @param integer $adMgrContactId
     *
     * @return Journal
     */
    public function setAdMgrContactId($adMgrContactId)
    {
        $this->ad_mgr_contact_id = $adMgrContactId;

        return $this;
    }

    /**
     * Get adMgrContactId
     *
     * @return integer
     */
    public function getAdMgrContactId()
    {
        return $this->ad_mgr_contact_id;
    }

    /**
     * Set editorContactId
     *
     * @param integer $editorContactId
     *
     * @return Journal
     */
    public function setEditorContactId($editorContactId)
    {
        $this->editor_contact_id = $editorContactId;

        return $this;
    }

    /**
     * Get editorContactId
     *
     * @return integer
     */
    public function getEditorContactId()
    {
        return $this->editor_contact_id;
    }

    /**
     * Set researchDirContactId
     *
     * @param integer $researchDirContactId
     *
     * @return Journal
     */
    public function setResearchDirContactId($researchDirContactId)
    {
        $this->research_dir_contact_id = $researchDirContactId;

        return $this;
    }

    /**
     * Get researchDirContactId
     *
     * @return integer
     */
    public function getResearchDirContactId()
    {
        return $this->research_dir_contact_id;
    }

    /**
     * Set circProductId
     *
     * @param string $circProductId
     *
     * @return Journal
     */
    public function setCircProductId($circProductId)
    {
        $this->circ_product_id = $circProductId;

        return $this;
    }

    /**
     * Get circProductId
     *
     * @return string
     */
    public function getCircProductId()
    {
        return $this->circ_product_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Journal
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
     * @return Journal
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
     * Set market
     *
     * @param \Entity\Bizj\Market $market
     *
     * @return Journal
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Entity\Bizj\Market
     */
    public function getMarket()
    {
        return $this->Market;
    }
}

