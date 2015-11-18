<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Set page_id
     *
     * @param integer $pageId
     * @return Page
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
     * Set site
     *
     * @param string $site
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
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return Page
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
     * Set release_time
     *
     * @param \DateTime $releaseTime
     * @return Page
     */
    public function setReleaseTime($releaseTime)
    {
        $this->release_time = $releaseTime;

        return $this;
    }

    /**
     * Get release_time
     *
     * @return \DateTime 
     */
    public function getReleaseTime()
    {
        return $this->release_time;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Page
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
     * @return Page
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
     * Set rev_number
     *
     * @param integer $revNumber
     * @return Page
     */
    public function setRevNumber($revNumber)
    {
        $this->rev_number = $revNumber;

        return $this;
    }

    /**
     * Get rev_number
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
     * Set short_headline
     *
     * @param string $shortHeadline
     * @return Page
     */
    public function setShortHeadline($shortHeadline)
    {
        $this->short_headline = $shortHeadline;

        return $this;
    }

    /**
     * Get short_headline
     *
     * @return string 
     */
    public function getShortHeadline()
    {
        return $this->short_headline;
    }

    /**
     * Set is_premium
     *
     * @param boolean $isPremium
     * @return Page
     */
    public function setIsPremium($isPremium)
    {
        $this->is_premium = $isPremium;

        return $this;
    }

    /**
     * Get is_premium
     *
     * @return boolean 
     */
    public function getIsPremium()
    {
        return $this->is_premium;
    }

    /**
     * Set journal_id
     *
     * @param integer $journalId
     * @return Page
     */
    public function setJournalId($journalId)
    {
        $this->journal_id = $journalId;

        return $this;
    }

    /**
     * Get journal_id
     *
     * @return integer 
     */
    public function getJournalId()
    {
        return $this->journal_id;
    }

    /**
     * Set type_id
     *
     * @param integer $typeId
     * @return Page
     */
    public function setTypeId($typeId)
    {
        $this->type_id = $typeId;

        return $this;
    }

    /**
     * Get type_id
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set parent_page_id
     *
     * @param integer $parentPageId
     * @return Page
     */
    public function setParentPageId($parentPageId)
    {
        $this->parent_page_id = $parentPageId;

        return $this;
    }

    /**
     * Get parent_page_id
     *
     * @return integer 
     */
    public function getParentPageId()
    {
        return $this->parent_page_id;
    }

    /**
     * Set published_at
     *
     * @param \DateTime $publishedAt
     * @return Page
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;

        return $this;
    }

    /**
     * Get published_at
     *
     * @return \DateTime 
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    /**
     * Set revised_at
     *
     * @param \DateTime $revisedAt
     * @return Page
     */
    public function setRevisedAt($revisedAt)
    {
        $this->revised_at = $revisedAt;

        return $this;
    }

    /**
     * Get revised_at
     *
     * @return \DateTime 
     */
    public function getRevisedAt()
    {
        return $this->revised_at;
    }

    /**
     * Set allow_syndication
     *
     * @param boolean $allowSyndication
     * @return Page
     */
    public function setAllowSyndication($allowSyndication)
    {
        $this->allow_syndication = $allowSyndication;

        return $this;
    }

    /**
     * Get allow_syndication
     *
     * @return boolean 
     */
    public function getAllowSyndication()
    {
        return $this->allow_syndication;
    }

    /**
     * Add Contents
     *
     * @param \Entity\Bizj\PageContent $contents
     * @return Page
     */
    public function addContent(\Entity\Bizj\PageContent $contents)
    {
        $this->Contents[] = $contents;

        return $this;
    }

    /**
     * Remove Contents
     *
     * @param \Entity\Bizj\PageContent $contents
     */
    public function removeContent(\Entity\Bizj\PageContent $contents)
    {
        $this->Contents->removeElement($contents);
    }

    /**
     * Get Contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->Contents;
    }

    /**
     * Add Corrections
     *
     * @param \Entity\Bizj\PageCorrection $corrections
     * @return Page
     */
    public function addCorrection(\Entity\Bizj\PageCorrection $corrections)
    {
        $this->Corrections[] = $corrections;

        return $this;
    }

    /**
     * Remove Corrections
     *
     * @param \Entity\Bizj\PageCorrection $corrections
     */
    public function removeCorrection(\Entity\Bizj\PageCorrection $corrections)
    {
        $this->Corrections->removeElement($corrections);
    }

    /**
     * Get Corrections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCorrections()
    {
        return $this->Corrections;
    }

    /**
     * Add Metadata
     *
     * @param \Entity\Bizj\PageMetadata $metadata
     * @return Page
     */
    public function addMetadatum(\Entity\Bizj\PageMetadata $metadata)
    {
        $this->Metadata[] = $metadata;

        return $this;
    }

    /**
     * Remove Metadata
     *
     * @param \Entity\Bizj\PageMetadata $metadata
     */
    public function removeMetadatum(\Entity\Bizj\PageMetadata $metadata)
    {
        $this->Metadata->removeElement($metadata);
    }

    /**
     * Get Metadata
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMetadata()
    {
        return $this->Metadata;
    }

    /**
     * Add LeadinGroups
     *
     * @param \Entity\Bizj\PageLeadinGroup $leadinGroups
     * @return Page
     */
    public function addLeadinGroup(\Entity\Bizj\PageLeadinGroup $leadinGroups)
    {
        $this->LeadinGroups[] = $leadinGroups;

        return $this;
    }

    /**
     * Remove LeadinGroups
     *
     * @param \Entity\Bizj\PageLeadinGroup $leadinGroups
     */
    public function removeLeadinGroup(\Entity\Bizj\PageLeadinGroup $leadinGroups)
    {
        $this->LeadinGroups->removeElement($leadinGroups);
    }

    /**
     * Get LeadinGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeadinGroups()
    {
        return $this->LeadinGroups;
    }

    /**
     * Add Crossrefs
     *
     * @param \Entity\Bizj\PageCrossref $crossrefs
     * @return Page
     */
    public function addCrossref(\Entity\Bizj\PageCrossref $crossrefs)
    {
        $this->Crossrefs[] = $crossrefs;

        return $this;
    }

    /**
     * Remove Crossrefs
     *
     * @param \Entity\Bizj\PageCrossref $crossrefs
     */
    public function removeCrossref(\Entity\Bizj\PageCrossref $crossrefs)
    {
        $this->Crossrefs->removeElement($crossrefs);
    }

    /**
     * Get Crossrefs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCrossrefs()
    {
        return $this->Crossrefs;
    }

    /**
     * Add LegacyMediaMap
     *
     * @param \Entity\Bizj\PageLegacyMediaMap $legacyMediaMap
     * @return Page
     */
    public function addLegacyMediaMap(\Entity\Bizj\PageLegacyMediaMap $legacyMediaMap)
    {
        $this->LegacyMediaMap[] = $legacyMediaMap;

        return $this;
    }

    /**
     * Remove LegacyMediaMap
     *
     * @param \Entity\Bizj\PageLegacyMediaMap $legacyMediaMap
     */
    public function removeLegacyMediaMap(\Entity\Bizj\PageLegacyMediaMap $legacyMediaMap)
    {
        $this->LegacyMediaMap->removeElement($legacyMediaMap);
    }

    /**
     * Get LegacyMediaMap
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLegacyMediaMap()
    {
        return $this->LegacyMediaMap;
    }

    /**
     * Add Media
     *
     * @param \Entity\Bizj\PageMedia $media
     * @return Page
     */
    public function addMedia(\Entity\Bizj\PageMedia $media)
    {
        $this->Media[] = $media;

        return $this;
    }

    /**
     * Remove Media
     *
     * @param \Entity\Bizj\PageMedia $media
     */
    public function removeMedia(\Entity\Bizj\PageMedia $media)
    {
        $this->Media->removeElement($media);
    }

    /**
     * Get Media
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Add Urls
     *
     * @param \Entity\Bizj\PageUrl $urls
     * @return Page
     */
    public function addUrl(\Entity\Bizj\PageUrl $urls)
    {
        $this->Urls[] = $urls;

        return $this;
    }

    /**
     * Remove Urls
     *
     * @param \Entity\Bizj\PageUrl $urls
     */
    public function removeUrl(\Entity\Bizj\PageUrl $urls)
    {
        $this->Urls->removeElement($urls);
    }

    /**
     * Get Urls
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUrls()
    {
        return $this->Urls;
    }
}
