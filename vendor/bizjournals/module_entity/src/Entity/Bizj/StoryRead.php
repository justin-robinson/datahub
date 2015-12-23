<?php

namespace Entity\Bizj;

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
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return StoryRead
     */
    public function setStoryId($storyId)
    {
        $this->story_id = $storyId;

        return $this;
    }

    /**
     * Get storyId
     *
     * @return integer
     */
    public function getStoryId()
    {
        return $this->story_id;
    }

    /**
     * Set siteId
     *
     * @param integer $siteId
     *
     * @return StoryRead
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get siteId
     *
     * @return integer
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return StoryRead
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set majorRev
     *
     * @param integer $majorRev
     *
     * @return StoryRead
     */
    public function setMajorRev($majorRev)
    {
        $this->major_rev = $majorRev;

        return $this;
    }

    /**
     * Get majorRev
     *
     * @return integer
     */
    public function getMajorRev()
    {
        return $this->major_rev;
    }

    /**
     * Set minorRev
     *
     * @param integer $minorRev
     *
     * @return StoryRead
     */
    public function setMinorRev($minorRev)
    {
        $this->minor_rev = $minorRev;

        return $this;
    }

    /**
     * Get minorRev
     *
     * @return integer
     */
    public function getMinorRev()
    {
        return $this->minor_rev;
    }

    /**
     * Set revTime
     *
     * @param \DateTime $revTime
     *
     * @return StoryRead
     */
    public function setRevTime($revTime)
    {
        $this->rev_time = $revTime;

        return $this;
    }

    /**
     * Get revTime
     *
     * @return \DateTime
     */
    public function getRevTime()
    {
        return $this->rev_time;
    }

    /**
     * Set releaseStatus
     *
     * @param string $releaseStatus
     *
     * @return StoryRead
     */
    public function setReleaseStatus($releaseStatus)
    {
        $this->release_status = $releaseStatus;

        return $this;
    }

    /**
     * Get releaseStatus
     *
     * @return string
     */
    public function getReleaseStatus()
    {
        return $this->release_status;
    }

    /**
     * Set releaseTime
     *
     * @param \DateTime $releaseTime
     *
     * @return StoryRead
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
     * Set issueId
     *
     * @param integer $issueId
     *
     * @return StoryRead
     */
    public function setIssueId($issueId)
    {
        $this->issue_id = $issueId;

        return $this;
    }

    /**
     * Get issueId
     *
     * @return integer
     */
    public function getIssueId()
    {
        return $this->issue_id;
    }

    /**
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return StoryRead
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
     * Set pub
     *
     * @param string $pub
     *
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
     *
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
     * Set storyType
     *
     * @param string $storyType
     *
     * @return StoryRead
     */
    public function setStoryType($storyType)
    {
        $this->story_type = $storyType;

        return $this;
    }

    /**
     * Get storyType
     *
     * @return string
     */
    public function getStoryType()
    {
        return $this->story_type;
    }

    /**
     * Set storyTypeOrderNum
     *
     * @param integer $storyTypeOrderNum
     *
     * @return StoryRead
     */
    public function setStoryTypeOrderNum($storyTypeOrderNum)
    {
        $this->story_type_order_num = $storyTypeOrderNum;

        return $this;
    }

    /**
     * Get storyTypeOrderNum
     *
     * @return integer
     */
    public function getStoryTypeOrderNum()
    {
        return $this->story_type_order_num;
    }

    /**
     * Set storySequenceNum
     *
     * @param integer $storySequenceNum
     *
     * @return StoryRead
     */
    public function setStorySequenceNum($storySequenceNum)
    {
        $this->story_sequence_num = $storySequenceNum;

        return $this;
    }

    /**
     * Get storySequenceNum
     *
     * @return integer
     */
    public function getStorySequenceNum()
    {
        return $this->story_sequence_num;
    }

    /**
     * Set displayTimeofday
     *
     * @param \DateTime $displayTimeofday
     *
     * @return StoryRead
     */
    public function setDisplayTimeofday($displayTimeofday)
    {
        $this->display_timeofday = $displayTimeofday;

        return $this;
    }

    /**
     * Get displayTimeofday
     *
     * @return \DateTime
     */
    public function getDisplayTimeofday()
    {
        return $this->display_timeofday;
    }

    /**
     * Set displayDate
     *
     * @param \DateTime $displayDate
     *
     * @return StoryRead
     */
    public function setDisplayDate($displayDate)
    {
        $this->display_date = $displayDate;

        return $this;
    }

    /**
     * Get displayDate
     *
     * @return \DateTime
     */
    public function getDisplayDate()
    {
        return $this->display_date;
    }

    /**
     * Set namedSectionId
     *
     * @param integer $namedSectionId
     *
     * @return StoryRead
     */
    public function setNamedSectionId($namedSectionId)
    {
        $this->named_section_id = $namedSectionId;

        return $this;
    }

    /**
     * Get namedSectionId
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
     *
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
     *
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
     *
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
     * Set originalByline
     *
     * @param string $originalByline
     *
     * @return StoryRead
     */
    public function setOriginalByline($originalByline)
    {
        $this->original_byline = $originalByline;

        return $this;
    }

    /**
     * Get originalByline
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
     *
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
     *
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
     *
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
     * Set editorsNote
     *
     * @param string $editorsNote
     *
     * @return StoryRead
     */
    public function setEditorsNote($editorsNote)
    {
        $this->editors_note = $editorsNote;

        return $this;
    }

    /**
     * Get editorsNote
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
     *
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
     *
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
     * Set externalUrl
     *
     * @param string $externalUrl
     *
     * @return StoryRead
     */
    public function setExternalUrl($externalUrl)
    {
        $this->external_url = $externalUrl;

        return $this;
    }

    /**
     * Get externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->external_url;
    }

    /**
     * Set publicationSrc
     *
     * @param string $publicationSrc
     *
     * @return StoryRead
     */
    public function setPublicationSrc($publicationSrc)
    {
        $this->publication_src = $publicationSrc;

        return $this;
    }

    /**
     * Get publicationSrc
     *
     * @return string
     */
    public function getPublicationSrc()
    {
        return $this->publication_src;
    }

    /**
     * Set bodyContent
     *
     * @param string $bodyContent
     *
     * @return StoryRead
     */
    public function setBodyContent($bodyContent)
    {
        $this->body_content = $bodyContent;

        return $this;
    }

    /**
     * Get bodyContent
     *
     * @return string
     */
    public function getBodyContent()
    {
        return $this->body_content;
    }

    /**
     * Set isPremium
     *
     * @param string $isPremium
     *
     * @return StoryRead
     */
    public function setIsPremium($isPremium)
    {
        $this->is_premium = $isPremium;

        return $this;
    }

    /**
     * Get isPremium
     *
     * @return string
     */
    public function getIsPremium()
    {
        return $this->is_premium;
    }

    /**
     * Set teaserHeadline
     *
     * @param string $teaserHeadline
     *
     * @return StoryRead
     */
    public function setTeaserHeadline($teaserHeadline)
    {
        $this->teaser_headline = $teaserHeadline;

        return $this;
    }

    /**
     * Get teaserHeadline
     *
     * @return string
     */
    public function getTeaserHeadline()
    {
        return $this->teaser_headline;
    }

    /**
     * Set defaultSkin
     *
     * @param string $defaultSkin
     *
     * @return StoryRead
     */
    public function setDefaultSkin($defaultSkin)
    {
        $this->default_skin = $defaultSkin;

        return $this;
    }

    /**
     * Get defaultSkin
     *
     * @return string
     */
    public function getDefaultSkin()
    {
        return $this->default_skin;
    }

    /**
     * Set parentStoryId
     *
     * @param integer $parentStoryId
     *
     * @return StoryRead
     */
    public function setParentStoryId($parentStoryId)
    {
        $this->parent_story_id = $parentStoryId;

        return $this;
    }

    /**
     * Get parentStoryId
     *
     * @return integer
     */
    public function getParentStoryId()
    {
        return $this->parent_story_id;
    }

    /**
     * Add company
     *
     * @param \Entity\Bizj\StoryEntityCompany $company
     *
     * @return StoryRead
     */
    public function addCompany(\Entity\Bizj\StoryEntityCompany $company)
    {
        $this->Companies[] = $company;

        return $this;
    }

    /**
     * Remove company
     *
     * @param \Entity\Bizj\StoryEntityCompany $company
     */
    public function removeCompany(\Entity\Bizj\StoryEntityCompany $company)
    {
        $this->Companies->removeElement($company);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanies()
    {
        return $this->Companies;
    }

    /**
     * Add person
     *
     * @param \Entity\Bizj\StoryPerson $person
     *
     * @return StoryRead
     */
    public function addPerson(\Entity\Bizj\StoryPerson $person)
    {
        $this->People[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \Entity\Bizj\StoryPerson $person
     */
    public function removePerson(\Entity\Bizj\StoryPerson $person)
    {
        $this->People->removeElement($person);
    }

    /**
     * Get people
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeople()
    {
        return $this->People;
    }

    /**
     * Add industry
     *
     * @param \Entity\Bizj\StoryVerticalSubtopic $industry
     *
     * @return StoryRead
     */
    public function addIndustry(\Entity\Bizj\StoryVerticalSubtopic $industry)
    {
        $this->Industries[] = $industry;

        return $this;
    }

    /**
     * Remove industry
     *
     * @param \Entity\Bizj\StoryVerticalSubtopic $industry
     */
    public function removeIndustry(\Entity\Bizj\StoryVerticalSubtopic $industry)
    {
        $this->Industries->removeElement($industry);
    }

    /**
     * Get industries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndustries()
    {
        return $this->Industries;
    }

    /**
     * Add image
     *
     * @param \Entity\Bizj\StoryImage $image
     *
     * @return StoryRead
     */
    public function addImage(\Entity\Bizj\StoryImage $image)
    {
        $this->Images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Entity\Bizj\StoryImage $image
     */
    public function removeImage(\Entity\Bizj\StoryImage $image)
    {
        $this->Images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * Add specialCategory
     *
     * @param \Entity\Bizj\StorySpecialCategory $specialCategory
     *
     * @return StoryRead
     */
    public function addSpecialCategory(\Entity\Bizj\StorySpecialCategory $specialCategory)
    {
        $this->SpecialCategories[] = $specialCategory;

        return $this;
    }

    /**
     * Remove specialCategory
     *
     * @param \Entity\Bizj\StorySpecialCategory $specialCategory
     */
    public function removeSpecialCategory(\Entity\Bizj\StorySpecialCategory $specialCategory)
    {
        $this->SpecialCategories->removeElement($specialCategory);
    }

    /**
     * Get specialCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialCategories()
    {
        return $this->SpecialCategories;
    }

    /**
     * Add correction
     *
     * @param \Entity\Bizj\StoryCorrections $correction
     *
     * @return StoryRead
     */
    public function addCorrection(\Entity\Bizj\StoryCorrections $correction)
    {
        $this->Corrections[] = $correction;

        return $this;
    }

    /**
     * Remove correction
     *
     * @param \Entity\Bizj\StoryCorrections $correction
     */
    public function removeCorrection(\Entity\Bizj\StoryCorrections $correction)
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
}

