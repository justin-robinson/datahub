<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoryRead
 */
class StoryRead extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $story_id;

    /**
     * @var integer
     */
    private $site_id = 1;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var integer
     */
    private $major_rev = 0;

    /**
     * @var integer
     */
    private $minor_rev = 0;

    /**
     * @var \DateTime
     */
    private $rev_time;

    /**
     * @var string
     */
    private $release_status = 'usable';

    /**
     * @var \DateTime
     */
    private $release_time;

    /**
     * @var integer
     */
    private $issue_id = 0;

    /**
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var string
     */
    private $pub;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $story_type;

    /**
     * @var integer
     */
    private $story_type_order_num = 0;

    /**
     * @var integer
     */
    private $story_sequence_num = 0;

    /**
     * @var \DateTime
     */
    private $display_timeofday;

    /**
     * @var \DateTime
     */
    private $display_date;

    /**
     * @var integer
     */
    private $named_section_id;

    /**
     * @var string
     */
    private $fixture;

    /**
     * @var string
     */
    private $byline;

    /**
     * @var string
     */
    private $bylineinfo;

    /**
     * @var string
     */
    private $original_byline;

    /**
     * @var string
     */
    private $tagline;

    /**
     * @var string
     */
    private $copyrite;

    /**
     * @var string
     */
    private $teaser;

    /**
     * @var string
     */
    private $editors_note;

    /**
     * @var string
     */
    private $headline;

    /**
     * @var string
     */
    private $subhead;

    /**
     * @var string
     */
    private $external_url;

    /**
     * @var string
     */
    private $publication_src;

    /**
     * @var string
     */
    private $body_content;

    /**
     * @var string
     */
    private $is_premium = '0';

    /**
     * @var string
     */
    private $teaser_headline;

    /**
     * @var string
     */
    private $default_skin;

    /**
     * @var integer
     */
    private $parent_story_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Companies;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $People;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Industries;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Images;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $SpecialCategories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Corrections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Companies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->People = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Industries = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SpecialCategories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Corrections = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set story_id
     *
     * @param integer $storyId
     * @return StoryRead
     */
    public function setStoryId($storyId)
    {
        $this->story_id = $storyId;

        return $this;
    }

    /**
     * Get story_id
     *
     * @return integer 
     */
    public function getStoryId()
    {
        return $this->story_id;
    }

    /**
     * Set site_id
     *
     * @param integer $siteId
     * @return StoryRead
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get site_id
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return StoryRead
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set major_rev
     *
     * @param integer $majorRev
     * @return StoryRead
     */
    public function setMajorRev($majorRev)
    {
        $this->major_rev = $majorRev;

        return $this;
    }

    /**
     * Get major_rev
     *
     * @return integer 
     */
    public function getMajorRev()
    {
        return $this->major_rev;
    }

    /**
     * Set minor_rev
     *
     * @param integer $minorRev
     * @return StoryRead
     */
    public function setMinorRev($minorRev)
    {
        $this->minor_rev = $minorRev;

        return $this;
    }

    /**
     * Get minor_rev
     *
     * @return integer 
     */
    public function getMinorRev()
    {
        return $this->minor_rev;
    }

    /**
     * Set rev_time
     *
     * @param \DateTime $revTime
     * @return StoryRead
     */
    public function setRevTime($revTime)
    {
        $this->rev_time = $revTime;

        return $this;
    }

    /**
     * Get rev_time
     *
     * @return \DateTime 
     */
    public function getRevTime()
    {
        return $this->rev_time;
    }

    /**
     * Set release_status
     *
     * @param string $releaseStatus
     * @return StoryRead
     */
    public function setReleaseStatus($releaseStatus)
    {
        $this->release_status = $releaseStatus;

        return $this;
    }

    /**
     * Get release_status
     *
     * @return string 
     */
    public function getReleaseStatus()
    {
        return $this->release_status;
    }

    /**
     * Set release_time
     *
     * @param \DateTime $releaseTime
     * @return StoryRead
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
     * Set issue_id
     *
     * @param integer $issueId
     * @return StoryRead
     */
    public function setIssueId($issueId)
    {
        $this->issue_id = $issueId;

        return $this;
    }

    /**
     * Get issue_id
     *
     * @return integer 
     */
    public function getIssueId()
    {
        return $this->issue_id;
    }

    /**
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return StoryRead
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
     * Set pub
     *
     * @param string $pub
     * @return StoryRead
     */
    public function setPub($pub)
    {
        $this->pub = $pub;

        return $this;
    }

    /**
     * Get pub
     *
     * @return string 
     */
    public function getPub()
    {
        return $this->pub;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return StoryRead
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
     * Set story_type
     *
     * @param string $storyType
     * @return StoryRead
     */
    public function setStoryType($storyType)
    {
        $this->story_type = $storyType;

        return $this;
    }

    /**
     * Get story_type
     *
     * @return string 
     */
    public function getStoryType()
    {
        return $this->story_type;
    }

    /**
     * Set story_type_order_num
     *
     * @param integer $storyTypeOrderNum
     * @return StoryRead
     */
    public function setStoryTypeOrderNum($storyTypeOrderNum)
    {
        $this->story_type_order_num = $storyTypeOrderNum;

        return $this;
    }

    /**
     * Get story_type_order_num
     *
     * @return integer 
     */
    public function getStoryTypeOrderNum()
    {
        return $this->story_type_order_num;
    }

    /**
     * Set story_sequence_num
     *
     * @param integer $storySequenceNum
     * @return StoryRead
     */
    public function setStorySequenceNum($storySequenceNum)
    {
        $this->story_sequence_num = $storySequenceNum;

        return $this;
    }

    /**
     * Get story_sequence_num
     *
     * @return integer 
     */
    public function getStorySequenceNum()
    {
        return $this->story_sequence_num;
    }

    /**
     * Set display_timeofday
     *
     * @param \DateTime $displayTimeofday
     * @return StoryRead
     */
    public function setDisplayTimeofday($displayTimeofday)
    {
        $this->display_timeofday = $displayTimeofday;

        return $this;
    }

    /**
     * Get display_timeofday
     *
     * @return \DateTime 
     */
    public function getDisplayTimeofday()
    {
        return $this->display_timeofday;
    }

    /**
     * Set display_date
     *
     * @param \DateTime $displayDate
     * @return StoryRead
     */
    public function setDisplayDate($displayDate)
    {
        $this->display_date = $displayDate;

        return $this;
    }

    /**
     * Get display_date
     *
     * @return \DateTime 
     */
    public function getDisplayDate()
    {
        return $this->display_date;
    }

    /**
     * Set named_section_id
     *
     * @param integer $namedSectionId
     * @return StoryRead
     */
    public function setNamedSectionId($namedSectionId)
    {
        $this->named_section_id = $namedSectionId;

        return $this;
    }

    /**
     * Get named_section_id
     *
     * @return integer 
     */
    public function getNamedSectionId()
    {
        return $this->named_section_id;
    }

    /**
     * Set fixture
     *
     * @param string $fixture
     * @return StoryRead
     */
    public function setFixture($fixture)
    {
        $this->fixture = $fixture;

        return $this;
    }

    /**
     * Get fixture
     *
     * @return string 
     */
    public function getFixture()
    {
        return $this->fixture;
    }

    /**
     * Set byline
     *
     * @param string $byline
     * @return StoryRead
     */
    public function setByline($byline)
    {
        $this->byline = $byline;

        return $this;
    }

    /**
     * Get byline
     *
     * @return string 
     */
    public function getByline()
    {
        return $this->byline;
    }

    /**
     * Set bylineinfo
     *
     * @param string $bylineinfo
     * @return StoryRead
     */
    public function setBylineinfo($bylineinfo)
    {
        $this->bylineinfo = $bylineinfo;

        return $this;
    }

    /**
     * Get bylineinfo
     *
     * @return string 
     */
    public function getBylineinfo()
    {
        return $this->bylineinfo;
    }

    /**
     * Set original_byline
     *
     * @param string $originalByline
     * @return StoryRead
     */
    public function setOriginalByline($originalByline)
    {
        $this->original_byline = $originalByline;

        return $this;
    }

    /**
     * Get original_byline
     *
     * @return string 
     */
    public function getOriginalByline()
    {
        return $this->original_byline;
    }

    /**
     * Set tagline
     *
     * @param string $tagline
     * @return StoryRead
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get tagline
     *
     * @return string 
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * Set copyrite
     *
     * @param string $copyrite
     * @return StoryRead
     */
    public function setCopyrite($copyrite)
    {
        $this->copyrite = $copyrite;

        return $this;
    }

    /**
     * Get copyrite
     *
     * @return string 
     */
    public function getCopyrite()
    {
        return $this->copyrite;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     * @return StoryRead
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set editors_note
     *
     * @param string $editorsNote
     * @return StoryRead
     */
    public function setEditorsNote($editorsNote)
    {
        $this->editors_note = $editorsNote;

        return $this;
    }

    /**
     * Get editors_note
     *
     * @return string 
     */
    public function getEditorsNote()
    {
        return $this->editors_note;
    }

    /**
     * Set headline
     *
     * @param string $headline
     * @return StoryRead
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
     * Set subhead
     *
     * @param string $subhead
     * @return StoryRead
     */
    public function setSubhead($subhead)
    {
        $this->subhead = $subhead;

        return $this;
    }

    /**
     * Get subhead
     *
     * @return string 
     */
    public function getSubhead()
    {
        return $this->subhead;
    }

    /**
     * Set external_url
     *
     * @param string $externalUrl
     * @return StoryRead
     */
    public function setExternalUrl($externalUrl)
    {
        $this->external_url = $externalUrl;

        return $this;
    }

    /**
     * Get external_url
     *
     * @return string 
     */
    public function getExternalUrl()
    {
        return $this->external_url;
    }

    /**
     * Set publication_src
     *
     * @param string $publicationSrc
     * @return StoryRead
     */
    public function setPublicationSrc($publicationSrc)
    {
        $this->publication_src = $publicationSrc;

        return $this;
    }

    /**
     * Get publication_src
     *
     * @return string 
     */
    public function getPublicationSrc()
    {
        return $this->publication_src;
    }

    /**
     * Set body_content
     *
     * @param string $bodyContent
     * @return StoryRead
     */
    public function setBodyContent($bodyContent)
    {
        $this->body_content = $bodyContent;

        return $this;
    }

    /**
     * Get body_content
     *
     * @return string 
     */
    public function getBodyContent()
    {
        return $this->body_content;
    }

    /**
     * Set is_premium
     *
     * @param string $isPremium
     * @return StoryRead
     */
    public function setIsPremium($isPremium)
    {
        $this->is_premium = $isPremium;

        return $this;
    }

    /**
     * Get is_premium
     *
     * @return string 
     */
    public function getIsPremium()
    {
        return $this->is_premium;
    }

    /**
     * Set teaser_headline
     *
     * @param string $teaserHeadline
     * @return StoryRead
     */
    public function setTeaserHeadline($teaserHeadline)
    {
        $this->teaser_headline = $teaserHeadline;

        return $this;
    }

    /**
     * Get teaser_headline
     *
     * @return string 
     */
    public function getTeaserHeadline()
    {
        return $this->teaser_headline;
    }

    /**
     * Set default_skin
     *
     * @param string $defaultSkin
     * @return StoryRead
     */
    public function setDefaultSkin($defaultSkin)
    {
        $this->default_skin = $defaultSkin;

        return $this;
    }

    /**
     * Get default_skin
     *
     * @return string 
     */
    public function getDefaultSkin()
    {
        return $this->default_skin;
    }

    /**
     * Set parent_story_id
     *
     * @param integer $parentStoryId
     * @return StoryRead
     */
    public function setParentStoryId($parentStoryId)
    {
        $this->parent_story_id = $parentStoryId;

        return $this;
    }

    /**
     * Get parent_story_id
     *
     * @return integer 
     */
    public function getParentStoryId()
    {
        return $this->parent_story_id;
    }

    /**
     * Add Companies
     *
     * @param \Entity\Bzjpreview\StoryEntityCompany $companies
     * @return StoryRead
     */
    public function addCompany(\Entity\Bzjpreview\StoryEntityCompany $companies)
    {
        $this->Companies[] = $companies;

        return $this;
    }

    /**
     * Remove Companies
     *
     * @param \Entity\Bzjpreview\StoryEntityCompany $companies
     */
    public function removeCompany(\Entity\Bzjpreview\StoryEntityCompany $companies)
    {
        $this->Companies->removeElement($companies);
    }

    /**
     * Get Companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanies()
    {
        return $this->Companies;
    }

    /**
     * Add People
     *
     * @param \Entity\Bzjpreview\StoryPerson $people
     * @return StoryRead
     */
    public function addPerson(\Entity\Bzjpreview\StoryPerson $people)
    {
        $this->People[] = $people;

        return $this;
    }

    /**
     * Remove People
     *
     * @param \Entity\Bzjpreview\StoryPerson $people
     */
    public function removePerson(\Entity\Bzjpreview\StoryPerson $people)
    {
        $this->People->removeElement($people);
    }

    /**
     * Get People
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPeople()
    {
        return $this->People;
    }

    /**
     * Add Industries
     *
     * @param \Entity\Bzjpreview\StoryVerticalSubtopic $industries
     * @return StoryRead
     */
    public function addIndustry(\Entity\Bzjpreview\StoryVerticalSubtopic $industries)
    {
        $this->Industries[] = $industries;

        return $this;
    }

    /**
     * Remove Industries
     *
     * @param \Entity\Bzjpreview\StoryVerticalSubtopic $industries
     */
    public function removeIndustry(\Entity\Bzjpreview\StoryVerticalSubtopic $industries)
    {
        $this->Industries->removeElement($industries);
    }

    /**
     * Get Industries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIndustries()
    {
        return $this->Industries;
    }

    /**
     * Add Images
     *
     * @param \Entity\Bzjpreview\StoryImage $images
     * @return StoryRead
     */
    public function addImage(\Entity\Bzjpreview\StoryImage $images)
    {
        $this->Images[] = $images;

        return $this;
    }

    /**
     * Remove Images
     *
     * @param \Entity\Bzjpreview\StoryImage $images
     */
    public function removeImage(\Entity\Bzjpreview\StoryImage $images)
    {
        $this->Images->removeElement($images);
    }

    /**
     * Get Images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * Add SpecialCategories
     *
     * @param \Entity\Bzjpreview\StorySpecialCategory $specialCategories
     * @return StoryRead
     */
    public function addSpecialCategory(\Entity\Bzjpreview\StorySpecialCategory $specialCategories)
    {
        $this->SpecialCategories[] = $specialCategories;

        return $this;
    }

    /**
     * Remove SpecialCategories
     *
     * @param \Entity\Bzjpreview\StorySpecialCategory $specialCategories
     */
    public function removeSpecialCategory(\Entity\Bzjpreview\StorySpecialCategory $specialCategories)
    {
        $this->SpecialCategories->removeElement($specialCategories);
    }

    /**
     * Get SpecialCategories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpecialCategories()
    {
        return $this->SpecialCategories;
    }

    /**
     * Add Corrections
     *
     * @param \Entity\Bzjpreview\StoryCorrections $corrections
     * @return StoryRead
     */
    public function addCorrection(\Entity\Bzjpreview\StoryCorrections $corrections)
    {
        $this->Corrections[] = $corrections;

        return $this;
    }

    /**
     * Remove Corrections
     *
     * @param \Entity\Bzjpreview\StoryCorrections $corrections
     */
    public function removeCorrection(\Entity\Bzjpreview\StoryCorrections $corrections)
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
}
