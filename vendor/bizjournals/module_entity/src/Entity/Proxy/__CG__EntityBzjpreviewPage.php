<?php

namespace Entity\Proxy\__CG__\Entity\Bzjpreview;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Page extends \Entity\Bzjpreview\Page implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = [];



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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'site', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'path', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'slug', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'issue_date', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'release_time', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'rev_number', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'headline', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'short_headline', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'is_premium', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'is_native', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'journal_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'type_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'parent_page_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'published_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'revised_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'allow_syndication', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Contents', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Corrections', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Metadata', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'LeadinGroups', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Crossrefs', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'LegacyMediaMap', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Media', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Urls'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'site', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'path', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'slug', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'issue_date', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'release_time', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'rev_number', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'headline', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'short_headline', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'is_premium', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'is_native', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'journal_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'type_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'parent_page_id', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'published_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'revised_at', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'allow_syndication', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Contents', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Corrections', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Metadata', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'LeadinGroups', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Crossrefs', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'LegacyMediaMap', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Media', '' . "\0" . 'Entity\\Bzjpreview\\Page' . "\0" . 'Urls'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Page $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
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
    public function setPageId($pageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageId', [$pageId]);

        return parent::setPageId($pageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageId', []);

        return parent::getPageId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSite($site)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSite', [$site]);

        return parent::setSite($site);
    }

    /**
     * {@inheritDoc}
     */
    public function getSite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSite', []);

        return parent::getSite();
    }

    /**
     * {@inheritDoc}
     */
    public function setPath($path)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPath', [$path]);

        return parent::setPath($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPath', []);

        return parent::getPath();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', [$slug]);

        return parent::setSlug($slug);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', []);

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setIssueDate($issueDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIssueDate', [$issueDate]);

        return parent::setIssueDate($issueDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getIssueDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIssueDate', []);

        return parent::getIssueDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setReleaseTime($releaseTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReleaseTime', [$releaseTime]);

        return parent::setReleaseTime($releaseTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getReleaseTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReleaseTime', []);

        return parent::getReleaseTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRevNumber($revNumber)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRevNumber', [$revNumber]);

        return parent::setRevNumber($revNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevNumber()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRevNumber', []);

        return parent::getRevNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadline($headline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadline', [$headline]);

        return parent::setHeadline($headline);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadline', []);

        return parent::getHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setShortHeadline($shortHeadline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShortHeadline', [$shortHeadline]);

        return parent::setShortHeadline($shortHeadline);
    }

    /**
     * {@inheritDoc}
     */
    public function getShortHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShortHeadline', []);

        return parent::getShortHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsPremium($isPremium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsPremium', [$isPremium]);

        return parent::setIsPremium($isPremium);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsPremium()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsPremium', []);

        return parent::getIsPremium();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsNative($isNative)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsNative', [$isNative]);

        return parent::setIsNative($isNative);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsNative()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsNative', []);

        return parent::getIsNative();
    }

    /**
     * {@inheritDoc}
     */
    public function setJournalId($journalId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJournalId', [$journalId]);

        return parent::setJournalId($journalId);
    }

    /**
     * {@inheritDoc}
     */
    public function getJournalId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJournalId', []);

        return parent::getJournalId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTypeId($typeId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTypeId', [$typeId]);

        return parent::setTypeId($typeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeId', []);

        return parent::getTypeId();
    }

    /**
     * {@inheritDoc}
     */
    public function setParentPageId($parentPageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParentPageId', [$parentPageId]);

        return parent::setParentPageId($parentPageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getParentPageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParentPageId', []);

        return parent::getParentPageId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublishedAt($publishedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublishedAt', [$publishedAt]);

        return parent::setPublishedAt($publishedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublishedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublishedAt', []);

        return parent::getPublishedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRevisedAt($revisedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRevisedAt', [$revisedAt]);

        return parent::setRevisedAt($revisedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevisedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRevisedAt', []);

        return parent::getRevisedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setAllowSyndication($allowSyndication)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAllowSyndication', [$allowSyndication]);

        return parent::setAllowSyndication($allowSyndication);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllowSyndication()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllowSyndication', []);

        return parent::getAllowSyndication();
    }

    /**
     * {@inheritDoc}
     */
    public function addContent(\Entity\Bzjpreview\PageContent $content)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addContent', [$content]);

        return parent::addContent($content);
    }

    /**
     * {@inheritDoc}
     */
    public function removeContent(\Entity\Bzjpreview\PageContent $content)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeContent', [$content]);

        return parent::removeContent($content);
    }

    /**
     * {@inheritDoc}
     */
    public function getContents()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContents', []);

        return parent::getContents();
    }

    /**
     * {@inheritDoc}
     */
    public function addCorrection(\Entity\Bzjpreview\PageCorrection $correction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCorrection', [$correction]);

        return parent::addCorrection($correction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCorrection(\Entity\Bzjpreview\PageCorrection $correction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCorrection', [$correction]);

        return parent::removeCorrection($correction);
    }

    /**
     * {@inheritDoc}
     */
    public function getCorrections()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCorrections', []);

        return parent::getCorrections();
    }

    /**
     * {@inheritDoc}
     */
    public function addMetadatum(\Entity\Bzjpreview\PageMetadata $metadatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMetadatum', [$metadatum]);

        return parent::addMetadatum($metadatum);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMetadatum(\Entity\Bzjpreview\PageMetadata $metadatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMetadatum', [$metadatum]);

        return parent::removeMetadatum($metadatum);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetadata', []);

        return parent::getMetadata();
    }

    /**
     * {@inheritDoc}
     */
    public function addLeadinGroup(\Entity\Bzjpreview\PageLeadinGroup $leadinGroup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLeadinGroup', [$leadinGroup]);

        return parent::addLeadinGroup($leadinGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLeadinGroup(\Entity\Bzjpreview\PageLeadinGroup $leadinGroup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLeadinGroup', [$leadinGroup]);

        return parent::removeLeadinGroup($leadinGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function getLeadinGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLeadinGroups', []);

        return parent::getLeadinGroups();
    }

    /**
     * {@inheritDoc}
     */
    public function addCrossref(\Entity\Bzjpreview\PageCrossref $crossref)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCrossref', [$crossref]);

        return parent::addCrossref($crossref);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCrossref(\Entity\Bzjpreview\PageCrossref $crossref)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCrossref', [$crossref]);

        return parent::removeCrossref($crossref);
    }

    /**
     * {@inheritDoc}
     */
    public function getCrossrefs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCrossrefs', []);

        return parent::getCrossrefs();
    }

    /**
     * {@inheritDoc}
     */
    public function addLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLegacyMediaMap', [$legacyMediaMap]);

        return parent::addLegacyMediaMap($legacyMediaMap);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $legacyMediaMap)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLegacyMediaMap', [$legacyMediaMap]);

        return parent::removeLegacyMediaMap($legacyMediaMap);
    }

    /**
     * {@inheritDoc}
     */
    public function getLegacyMediaMap()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLegacyMediaMap', []);

        return parent::getLegacyMediaMap();
    }

    /**
     * {@inheritDoc}
     */
    public function addMedia(\Entity\Bzjpreview\PageMedia $medium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMedia', [$medium]);

        return parent::addMedia($medium);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMedia(\Entity\Bzjpreview\PageMedia $medium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMedia', [$medium]);

        return parent::removeMedia($medium);
    }

    /**
     * {@inheritDoc}
     */
    public function getMedia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMedia', []);

        return parent::getMedia();
    }

    /**
     * {@inheritDoc}
     */
    public function addUrl(\Entity\Bzjpreview\PageUrl $url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUrl', [$url]);

        return parent::addUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUrl(\Entity\Bzjpreview\PageUrl $url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUrl', [$url]);

        return parent::removeUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrls()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrls', []);

        return parent::getUrls();
    }

}
