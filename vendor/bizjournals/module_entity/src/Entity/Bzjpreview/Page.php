<?php

namespace Entity\Bzjpreview;

/**
 * Page
 */
class Page extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var \DateTime
     */
    private $release_time;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var integer
     */
    private $rev_number = 0;

    /**
     * @var string
     */
    private $headline;

    /**
     * @var string
     */
    private $short_headline;

    /**
     * @var boolean
     */
    private $is_premium = false;

    /**
     * @var boolean
     */
    private $is_native = false;

    /**
     * @var integer
     */
    private $journal_id;

    /**
     * @var integer
     */
    private $type_id;

    /**
     * @var integer
     */
    private $parent_page_id;

    /**
     * @var \DateTime
     */
    private $published_at;

    /**
     * @var \DateTime
     */
    private $revised_at;

    /**
     * @var boolean
     */
    private $allow_syndication = true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Contents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Corrections;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Metadata;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LeadinGroups;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Crossrefs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LegacyMediaMap;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Media;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Urls;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Contents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Corrections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Metadata = new \Doctrine\Common\Collections\ArrayCollection();
        $this->LeadinGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Crossrefs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->LegacyMediaMap = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Urls = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return Page
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
     * Set site
     *
     * @param string $site
     *
     * @return Page
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Page
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return Page
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
     * Set releaseTime
     *
     * @param \DateTime $releaseTime
     *
     * @return Page
     */
    public function setReleaseTime($releaseTime)
    {
        $this->release_time = $releaseTime;

        return $this;
    }

    /**
     * Get releaseTime
     *
     * @return \DateTime
     */
    public function getReleaseTime()
    {
        return $this->release_time;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Page
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
     * @return Page
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
     * Set revNumber
     *
     * @param integer $revNumber
     *
     * @return Page
     */
    public function setRevNumber($revNumber)
    {
        $this->rev_number = $revNumber;

        return $this;
    }

    /**
     * Get revNumber
     *
     * @return integer
     */
    public function getRevNumber()
    {
        return $this->rev_number;
    }

    /**
     * Set headline
     *
     * @param string $headline
     *
     * @return Page
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set shortHeadline
     *
     * @param string $shortHeadline
     *
     * @return Page
     */
    public function setShortHeadline($shortHeadline)
    {
        $this->short_headline = $shortHeadline;

        return $this;
    }

    /**
     * Get shortHeadline
     *
     * @return string
     */
    public function getShortHeadline()
    {
        return $this->short_headline;
    }

    /**
     * Set isPremium
     *
     * @param boolean $isPremium
     *
     * @return Page
     */
    public function setIsPremium($isPremium)
    {
        $this->is_premium = $isPremium;

        return $this;
    }

    /**
     * Get isPremium
     *
     * @return boolean
     */
    public function getIsPremium()
    {
        return $this->is_premium;
    }

    /**
     * Set isNative
     *
     * @param boolean $isNative
     *
     * @return Page
     */
    public function setIsNative($isNative)
    {
        $this->is_native = $isNative;

        return $this;
    }

    /**
     * Get isNative
     *
     * @return boolean
     */
    public function getIsNative()
    {
        return $this->is_native;
    }

    /**
     * Set journalId
     *
     * @param integer $journalId
     *
     * @return Page
     */
    public function setJournalId($journalId)
    {
        $this->journal_id = $journalId;

        return $this;
    }

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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Page
     */
    public function setTypeId($typeId)
    {
        $this->type_id = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set parentPageId
     *
     * @param integer $parentPageId
     *
     * @return Page
     */
    public function setParentPageId($parentPageId)
    {
        $this->parent_page_id = $parentPageId;

        return $this;
    }

    /**
     * Get parentPageId
     *
     * @return integer
     */
    public function getParentPageId()
    {
        return $this->parent_page_id;
    }

    /**
     * Set publishedAt
     *
     * @param \DateTime $publishedAt
     *
     * @return Page
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;

        return $this;
    }

    /**
     * Get publishedAt
     *
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    /**
     * Set revisedAt
     *
     * @param \DateTime $revisedAt
     *
     * @return Page
     */
    public function setRevisedAt($revisedAt)
    {
        $this->revised_at = $revisedAt;

        return $this;
    }

    /**
     * Get revisedAt
     *
     * @return \DateTime
     */
    public function getRevisedAt()
    {
        return $this->revised_at;
    }

    /**
     * Set allowSyndication
     *
     * @param boolean $allowSyndication
     *
     * @return Page
     */
    public function setAllowSyndication($allowSyndication)
    {
        $this->allow_syndication = $allowSyndication;

        return $this;
    }

    /**
     * Get allowSyndication
     *
     * @return boolean
     */
    public function getAllowSyndication()
    {
        return $this->allow_syndication;
    }

    /**
     * Add content
     *
     * @param \Entity\Bzjpreview\PageContent $content
     *
     * @return Page
     */
    public function addContent(\Entity\Bzjpreview\PageContent $content)
    {
        $this->Contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \Entity\Bzjpreview\PageContent $content
     */
    public function removeContent(\Entity\Bzjpreview\PageContent $content)
    {
        $this->Contents->removeElement($content);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents()
    {
        return $this->Contents;
    }

    /**
     * Add correction
     *
     * @param \Entity\Bzjpreview\PageCorrection $correction
     *
     * @return Page
     */
    public function addCorrection(\Entity\Bzjpreview\PageCorrection $correction)
    {
        $this->Corrections[] = $correction;

        return $this;
    }

    /**
     * Remove correction
     *
     * @param \Entity\Bzjpreview\PageCorrection $correction
     */
    public function removeCorrection(\Entity\Bzjpreview\PageCorrection $correction)
    {
        $this->Corrections->removeElement($correction);
    }

    /**
     * Get corrections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorrections()
    {
        return $this->Corrections;
    }

    /**
     * Add metadatum
     *
     * @param \Entity\Bzjpreview\PageMetadata $metadatum
     *
     * @return Page
     */
    public function addMetadatum(\Entity\Bzjpreview\PageMetadata $metadatum)
    {
        $this->Metadata[] = $metadatum;

        return $this;
    }

    /**
     * Remove metadatum
     *
     * @param \Entity\Bzjpreview\PageMetadata $metadatum
     */
    public function removeMetadatum(\Entity\Bzjpreview\PageMetadata $metadatum)
    {
        $this->Metadata->removeElement($metadatum);
    }

    /**
     * Get metadata
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetadata()
    {
        return $this->Metadata;
    }

    /**
     * Add leadinGroup
     *
     * @param \Entity\Bzjpreview\PageLeadinGroup $leadinGroup
     *
     * @return Page
     */
    public function addLeadinGroup(\Entity\Bzjpreview\PageLeadinGroup $leadinGroup)
    {
        $this->LeadinGroups[] = $leadinGroup;

        return $this;
    }

    /**
     * Remove leadinGroup
     *
     * @param \Entity\Bzjpreview\PageLeadinGroup $leadinGroup
     */
    public function removeLeadinGroup(\Entity\Bzjpreview\PageLeadinGroup $leadinGroup)
    {
        $this->LeadinGroups->removeElement($leadinGroup);
    }

    /**
     * Get leadinGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeadinGroups()
    {
        return $this->LeadinGroups;
    }

    /**
     * Add crossref
     *
     * @param \Entity\Bzjpreview\PageCrossref $crossref
     *
     * @return Page
     */
    public function addCrossref(\Entity\Bzjpreview\PageCrossref $crossref)
    {
        $this->Crossrefs[] = $crossref;

        return $this;
    }

    /**
     * Remove crossref
     *
     * @param \Entity\Bzjpreview\PageCrossref $crossref
     */
    public function removeCrossref(\Entity\Bzjpreview\PageCrossref $crossref)
    {
        $this->Crossrefs->removeElement($crossref);
    }

    /**
     * Get crossrefs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCrossrefs()
    {
        return $this->Crossrefs;
    }

    /**
     * Add legacyMediaMap
     *
     * @param \Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap
     *
     * @return Page
     */
    public function addLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap)
    {
        $this->LegacyMediaMap[] = $legacyMediaMap;

        return $this;
    }

    /**
     * Remove legacyMediaMap
     *
     * @param \Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap
     */
    public function removeLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap)
    {
        $this->LegacyMediaMap->removeElement($legacyMediaMap);
    }

    /**
     * Get legacyMediaMap
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLegacyMediaMap()
    {
        return $this->LegacyMediaMap;
    }

    /**
     * Add medium
     *
     * @param \Entity\Bzjpreview\PageMedia $medium
     *
     * @return Page
     */
    public function addMedia(\Entity\Bzjpreview\PageMedia $medium)
    {
        $this->Media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \Entity\Bzjpreview\PageMedia $medium
     */
    public function removeMedia(\Entity\Bzjpreview\PageMedia $medium)
    {
        $this->Media->removeElement($medium);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Add url
     *
     * @param \Entity\Bzjpreview\PageUrl $url
     *
     * @return Page
     */
    public function addUrl(\Entity\Bzjpreview\PageUrl $url)
    {
        $this->Urls[] = $url;

        return $this;
    }

    /**
     * Remove url
     *
     * @param \Entity\Bzjpreview\PageUrl $url
     */
    public function removeUrl(\Entity\Bzjpreview\PageUrl $url)
    {
        $this->Urls->removeElement($url);
    }

    /**
     * Get urls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUrls()
    {
        return $this->Urls;
    }
}

