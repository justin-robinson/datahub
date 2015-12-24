<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class StoryRead extends \Entity\Bizj\StoryRead implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'site_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'major_rev', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'minor_rev', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'rev_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'release_status', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'release_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'issue_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'issue_date', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'pub', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'slug', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_type', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_type_order_num', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_sequence_num', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'display_timeofday', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'display_date', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'named_section_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'fixture', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'byline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'bylineinfo', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'original_byline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'tagline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'copyrite', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'teaser', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'editors_note', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'headline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'subhead', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'external_url', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'publication_src', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'body_content', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'is_premium', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'teaser_headline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'default_skin', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'parent_story_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Companies', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'People', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Industries', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Images', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'SpecialCategories', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Corrections');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'site_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'c_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'major_rev', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'minor_rev', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'rev_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'release_status', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'release_time', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'issue_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'issue_date', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'pub', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'slug', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_type', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_type_order_num', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'story_sequence_num', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'display_timeofday', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'display_date', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'named_section_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'fixture', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'byline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'bylineinfo', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'original_byline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'tagline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'copyrite', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'teaser', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'editors_note', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'headline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'subhead', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'external_url', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'publication_src', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'body_content', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'is_premium', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'teaser_headline', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'default_skin', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'parent_story_id', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Companies', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'People', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Industries', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Images', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'SpecialCategories', '' . "\0" . 'Entity\\Bizj\\StoryRead' . "\0" . 'Corrections');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (StoryRead $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setStoryId($storyId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStoryId', array($storyId));

        return parent::setStoryId($storyId);
    }

    /**
     * {@inheritDoc}
     */
    public function getStoryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStoryId', array());

        return parent::getStoryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteId($siteId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiteId', array($siteId));

        return parent::setSiteId($siteId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteId', array());

        return parent::getSiteId();
    }

    /**
     * {@inheritDoc}
     */
    public function setCTime($cTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCTime', array($cTime));

        return parent::setCTime($cTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getCTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCTime', array());

        return parent::getCTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setMajorRev($majorRev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMajorRev', array($majorRev));

        return parent::setMajorRev($majorRev);
    }

    /**
     * {@inheritDoc}
     */
    public function getMajorRev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMajorRev', array());

        return parent::getMajorRev();
    }

    /**
     * {@inheritDoc}
     */
    public function setMinorRev($minorRev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMinorRev', array($minorRev));

        return parent::setMinorRev($minorRev);
    }

    /**
     * {@inheritDoc}
     */
    public function getMinorRev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMinorRev', array());

        return parent::getMinorRev();
    }

    /**
     * {@inheritDoc}
     */
    public function setRevTime($revTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRevTime', array($revTime));

        return parent::setRevTime($revTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRevTime', array());

        return parent::getRevTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setReleaseStatus($releaseStatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReleaseStatus', array($releaseStatus));

        return parent::setReleaseStatus($releaseStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getReleaseStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReleaseStatus', array());

        return parent::getReleaseStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setReleaseTime($releaseTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReleaseTime', array($releaseTime));

        return parent::setReleaseTime($releaseTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getReleaseTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReleaseTime', array());

        return parent::getReleaseTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setIssueId($issueId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIssueId', array($issueId));

        return parent::setIssueId($issueId);
    }

    /**
     * {@inheritDoc}
     */
    public function getIssueId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIssueId', array());

        return parent::getIssueId();
    }

    /**
     * {@inheritDoc}
     */
    public function setIssueDate($issueDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIssueDate', array($issueDate));

        return parent::setIssueDate($issueDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getIssueDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIssueDate', array());

        return parent::getIssueDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setPub($pub)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPub', array($pub));

        return parent::setPub($pub);
    }

    /**
     * {@inheritDoc}
     */
    public function getPub()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPub', array());

        return parent::getPub();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', array($slug));

        return parent::setSlug($slug);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', array());

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setStoryType($storyType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStoryType', array($storyType));

        return parent::setStoryType($storyType);
    }

    /**
     * {@inheritDoc}
     */
    public function getStoryType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStoryType', array());

        return parent::getStoryType();
    }

    /**
     * {@inheritDoc}
     */
    public function setStoryTypeOrderNum($storyTypeOrderNum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStoryTypeOrderNum', array($storyTypeOrderNum));

        return parent::setStoryTypeOrderNum($storyTypeOrderNum);
    }

    /**
     * {@inheritDoc}
     */
    public function getStoryTypeOrderNum()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStoryTypeOrderNum', array());

        return parent::getStoryTypeOrderNum();
    }

    /**
     * {@inheritDoc}
     */
    public function setStorySequenceNum($storySequenceNum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStorySequenceNum', array($storySequenceNum));

        return parent::setStorySequenceNum($storySequenceNum);
    }

    /**
     * {@inheritDoc}
     */
    public function getStorySequenceNum()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStorySequenceNum', array());

        return parent::getStorySequenceNum();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplayTimeofday($displayTimeofday)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisplayTimeofday', array($displayTimeofday));

        return parent::setDisplayTimeofday($displayTimeofday);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayTimeofday()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayTimeofday', array());

        return parent::getDisplayTimeofday();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplayDate($displayDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisplayDate', array($displayDate));

        return parent::setDisplayDate($displayDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayDate', array());

        return parent::getDisplayDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setNamedSectionId($namedSectionId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNamedSectionId', array($namedSectionId));

        return parent::setNamedSectionId($namedSectionId);
    }

    /**
     * {@inheritDoc}
     */
    public function getNamedSectionId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNamedSectionId', array());

        return parent::getNamedSectionId();
    }

    /**
     * {@inheritDoc}
     */
    public function setFixture($fixture)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFixture', array($fixture));

        return parent::setFixture($fixture);
    }

    /**
     * {@inheritDoc}
     */
    public function getFixture()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFixture', array());

        return parent::getFixture();
    }

    /**
     * {@inheritDoc}
     */
    public function setByline($byline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setByline', array($byline));

        return parent::setByline($byline);
    }

    /**
     * {@inheritDoc}
     */
    public function getByline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getByline', array());

        return parent::getByline();
    }

    /**
     * {@inheritDoc}
     */
    public function setBylineinfo($bylineinfo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBylineinfo', array($bylineinfo));

        return parent::setBylineinfo($bylineinfo);
    }

    /**
     * {@inheritDoc}
     */
    public function getBylineinfo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBylineinfo', array());

        return parent::getBylineinfo();
    }

    /**
     * {@inheritDoc}
     */
    public function setOriginalByline($originalByline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOriginalByline', array($originalByline));

        return parent::setOriginalByline($originalByline);
    }

    /**
     * {@inheritDoc}
     */
    public function getOriginalByline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOriginalByline', array());

        return parent::getOriginalByline();
    }

    /**
     * {@inheritDoc}
     */
    public function setTagline($tagline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTagline', array($tagline));

        return parent::setTagline($tagline);
    }

    /**
     * {@inheritDoc}
     */
    public function getTagline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTagline', array());

        return parent::getTagline();
    }

    /**
     * {@inheritDoc}
     */
    public function setCopyrite($copyrite)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCopyrite', array($copyrite));

        return parent::setCopyrite($copyrite);
    }

    /**
     * {@inheritDoc}
     */
    public function getCopyrite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCopyrite', array());

        return parent::getCopyrite();
    }

    /**
     * {@inheritDoc}
     */
    public function setTeaser($teaser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTeaser', array($teaser));

        return parent::setTeaser($teaser);
    }

    /**
     * {@inheritDoc}
     */
    public function getTeaser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTeaser', array());

        return parent::getTeaser();
    }

    /**
     * {@inheritDoc}
     */
    public function setEditorsNote($editorsNote)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEditorsNote', array($editorsNote));

        return parent::setEditorsNote($editorsNote);
    }

    /**
     * {@inheritDoc}
     */
    public function getEditorsNote()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEditorsNote', array());

        return parent::getEditorsNote();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadline($headline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadline', array($headline));

        return parent::setHeadline($headline);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadline', array());

        return parent::getHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubhead($subhead)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubhead', array($subhead));

        return parent::setSubhead($subhead);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubhead()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubhead', array());

        return parent::getSubhead();
    }

    /**
     * {@inheritDoc}
     */
    public function setExternalUrl($externalUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExternalUrl', array($externalUrl));

        return parent::setExternalUrl($externalUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getExternalUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExternalUrl', array());

        return parent::getExternalUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublicationSrc($publicationSrc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublicationSrc', array($publicationSrc));

        return parent::setPublicationSrc($publicationSrc);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublicationSrc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublicationSrc', array());

        return parent::getPublicationSrc();
    }

    /**
     * {@inheritDoc}
     */
    public function setBodyContent($bodyContent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBodyContent', array($bodyContent));

        return parent::setBodyContent($bodyContent);
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyContent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBodyContent', array());

        return parent::getBodyContent();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsPremium($isPremium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsPremium', array($isPremium));

        return parent::setIsPremium($isPremium);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsPremium()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsPremium', array());

        return parent::getIsPremium();
    }

    /**
     * {@inheritDoc}
     */
    public function setTeaserHeadline($teaserHeadline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTeaserHeadline', array($teaserHeadline));

        return parent::setTeaserHeadline($teaserHeadline);
    }

    /**
     * {@inheritDoc}
     */
    public function getTeaserHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTeaserHeadline', array());

        return parent::getTeaserHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultSkin($defaultSkin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefaultSkin', array($defaultSkin));

        return parent::setDefaultSkin($defaultSkin);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultSkin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefaultSkin', array());

        return parent::getDefaultSkin();
    }

    /**
     * {@inheritDoc}
     */
    public function setParentStoryId($parentStoryId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParentStoryId', array($parentStoryId));

        return parent::setParentStoryId($parentStoryId);
    }

    /**
     * {@inheritDoc}
     */
    public function getParentStoryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParentStoryId', array());

        return parent::getParentStoryId();
    }

    /**
     * {@inheritDoc}
     */
    public function addCompany(\Entity\Bizj\StoryEntityCompany $company)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCompany', array($company));

        return parent::addCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCompany(\Entity\Bizj\StoryEntityCompany $company)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCompany', array($company));

        return parent::removeCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanies()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanies', array());

        return parent::getCompanies();
    }

    /**
     * {@inheritDoc}
     */
    public function addPerson(\Entity\Bizj\StoryPerson $person)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPerson', array($person));

        return parent::addPerson($person);
    }

    /**
     * {@inheritDoc}
     */
    public function removePerson(\Entity\Bizj\StoryPerson $person)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePerson', array($person));

        return parent::removePerson($person);
    }

    /**
     * {@inheritDoc}
     */
    public function getPeople()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPeople', array());

        return parent::getPeople();
    }

    /**
     * {@inheritDoc}
     */
    public function addIndustry(\Entity\Bizj\StoryVerticalSubtopic $industry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIndustry', array($industry));

        return parent::addIndustry($industry);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIndustry(\Entity\Bizj\StoryVerticalSubtopic $industry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIndustry', array($industry));

        return parent::removeIndustry($industry);
    }

    /**
     * {@inheritDoc}
     */
    public function getIndustries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIndustries', array());

        return parent::getIndustries();
    }

    /**
     * {@inheritDoc}
     */
    public function addImage(\Entity\Bizj\StoryImage $image)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImage', array($image));

        return parent::addImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImage(\Entity\Bizj\StoryImage $image)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImage', array($image));

        return parent::removeImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function getImages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImages', array());

        return parent::getImages();
    }

    /**
     * {@inheritDoc}
     */
    public function addSpecialCategory(\Entity\Bizj\StorySpecialCategory $specialCategory)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSpecialCategory', array($specialCategory));

        return parent::addSpecialCategory($specialCategory);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSpecialCategory(\Entity\Bizj\StorySpecialCategory $specialCategory)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSpecialCategory', array($specialCategory));

        return parent::removeSpecialCategory($specialCategory);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpecialCategories()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpecialCategories', array());

        return parent::getSpecialCategories();
    }

    /**
     * {@inheritDoc}
     */
    public function addCorrection(\Entity\Bizj\StoryCorrections $correction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCorrection', array($correction));

        return parent::addCorrection($correction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCorrection(\Entity\Bizj\StoryCorrections $correction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCorrection', array($correction));

        return parent::removeCorrection($correction);
    }

    /**
     * {@inheritDoc}
     */
    public function getCorrections()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCorrections', array());

        return parent::getCorrections();
    }

}
