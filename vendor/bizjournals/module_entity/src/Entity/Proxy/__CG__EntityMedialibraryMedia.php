<?php

namespace Entity\Proxy\__CG__\Entity\Medialibrary;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Media extends \Entity\Medialibrary\Media implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'md5_hash', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'media_size', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'category', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'source_file', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'expires_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'filename', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'height', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'width', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_image', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'image_format', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'mime_type', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_pub_restricted', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'copyright_notice', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_live', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'upload_date', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaCrop', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaMetadata', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaLinks', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaTags', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'UploadBatches', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaPubs', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'GalleryMedia', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'Tags', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'Publications'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'media_id', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'md5_hash', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'media_size', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'category', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'source_file', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'created_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'expires_at', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'filename', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'height', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'width', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_image', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'image_format', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'mime_type', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_pub_restricted', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'copyright_notice', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'is_live', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'upload_date', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaCrop', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaMetadata', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaLinks', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaTags', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'UploadBatches', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'MediaPubs', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'GalleryMedia', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'Tags', '' . "\0" . 'Entity\\Medialibrary\\Media' . "\0" . 'Publications'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Media $proxy) {
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
    public function getMediaId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaId', []);

        return parent::getMediaId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMd5Hash($md5Hash)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMd5Hash', [$md5Hash]);

        return parent::setMd5Hash($md5Hash);
    }

    /**
     * {@inheritDoc}
     */
    public function getMd5Hash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMd5Hash', []);

        return parent::getMd5Hash();
    }

    /**
     * {@inheritDoc}
     */
    public function setMediaSize($mediaSize)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMediaSize', [$mediaSize]);

        return parent::setMediaSize($mediaSize);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaSize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaSize', []);

        return parent::getMediaSize();
    }

    /**
     * {@inheritDoc}
     */
    public function setCategory($category)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategory', [$category]);

        return parent::setCategory($category);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategory', []);

        return parent::getCategory();
    }

    /**
     * {@inheritDoc}
     */
    public function setSourceFile($sourceFile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSourceFile', [$sourceFile]);

        return parent::setSourceFile($sourceFile);
    }

    /**
     * {@inheritDoc}
     */
    public function getSourceFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSourceFile', []);

        return parent::getSourceFile();
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
    public function setExpiresAt($expiresAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExpiresAt', [$expiresAt]);

        return parent::setExpiresAt($expiresAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getExpiresAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExpiresAt', []);

        return parent::getExpiresAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setFilename($filename)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFilename', [$filename]);

        return parent::setFilename($filename);
    }

    /**
     * {@inheritDoc}
     */
    public function getFilename()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFilename', []);

        return parent::getFilename();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeight($height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeight', [$height]);

        return parent::setHeight($height);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeight', []);

        return parent::getHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setWidth($width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWidth', [$width]);

        return parent::setWidth($width);
    }

    /**
     * {@inheritDoc}
     */
    public function getWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWidth', []);

        return parent::getWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsImage($isImage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsImage', [$isImage]);

        return parent::setIsImage($isImage);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsImage', []);

        return parent::getIsImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageFormat($imageFormat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageFormat', [$imageFormat]);

        return parent::setImageFormat($imageFormat);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageFormat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageFormat', []);

        return parent::getImageFormat();
    }

    /**
     * {@inheritDoc}
     */
    public function setMimeType($mimeType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMimeType', [$mimeType]);

        return parent::setMimeType($mimeType);
    }

    /**
     * {@inheritDoc}
     */
    public function getMimeType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMimeType', []);

        return parent::getMimeType();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsPubRestricted($isPubRestricted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsPubRestricted', [$isPubRestricted]);

        return parent::setIsPubRestricted($isPubRestricted);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsPubRestricted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsPubRestricted', []);

        return parent::getIsPubRestricted();
    }

    /**
     * {@inheritDoc}
     */
    public function setCopyrightNotice($copyrightNotice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCopyrightNotice', [$copyrightNotice]);

        return parent::setCopyrightNotice($copyrightNotice);
    }

    /**
     * {@inheritDoc}
     */
    public function getCopyrightNotice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCopyrightNotice', []);

        return parent::getCopyrightNotice();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsLive($isLive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsLive', [$isLive]);

        return parent::setIsLive($isLive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsLive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsLive', []);

        return parent::getIsLive();
    }

    /**
     * {@inheritDoc}
     */
    public function setUploadDate($uploadDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUploadDate', [$uploadDate]);

        return parent::setUploadDate($uploadDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUploadDate', []);

        return parent::getUploadDate();
    }

    /**
     * {@inheritDoc}
     */
    public function addMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMediaCrop', [$mediaCrop]);

        return parent::addMediaCrop($mediaCrop);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMediaCrop', [$mediaCrop]);

        return parent::removeMediaCrop($mediaCrop);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaCrop()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaCrop', []);

        return parent::getMediaCrop();
    }

    /**
     * {@inheritDoc}
     */
    public function addMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMediaMetadatum', [$mediaMetadatum]);

        return parent::addMediaMetadatum($mediaMetadatum);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMediaMetadatum', [$mediaMetadatum]);

        return parent::removeMediaMetadatum($mediaMetadatum);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaMetadata()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaMetadata', []);

        return parent::getMediaMetadata();
    }

    /**
     * {@inheritDoc}
     */
    public function addMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMediaLink', [$mediaLink]);

        return parent::addMediaLink($mediaLink);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMediaLink', [$mediaLink]);

        return parent::removeMediaLink($mediaLink);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaLinks()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaLinks', []);

        return parent::getMediaLinks();
    }

    /**
     * {@inheritDoc}
     */
    public function addMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMediaTag', [$mediaTag]);

        return parent::addMediaTag($mediaTag);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMediaTag', [$mediaTag]);

        return parent::removeMediaTag($mediaTag);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaTags()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaTags', []);

        return parent::getMediaTags();
    }

    /**
     * {@inheritDoc}
     */
    public function addUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatch)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUploadBatch', [$uploadBatch]);

        return parent::addUploadBatch($uploadBatch);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatch)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUploadBatch', [$uploadBatch]);

        return parent::removeUploadBatch($uploadBatch);
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadBatches()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUploadBatches', []);

        return parent::getUploadBatches();
    }

    /**
     * {@inheritDoc}
     */
    public function addMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMediaPub', [$mediaPub]);

        return parent::addMediaPub($mediaPub);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMediaPub', [$mediaPub]);

        return parent::removeMediaPub($mediaPub);
    }

    /**
     * {@inheritDoc}
     */
    public function getMediaPubs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMediaPubs', []);

        return parent::getMediaPubs();
    }

    /**
     * {@inheritDoc}
     */
    public function addGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addGalleryMedia', [$galleryMedia]);

        return parent::addGalleryMedia($galleryMedia);
    }

    /**
     * {@inheritDoc}
     */
    public function removeGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeGalleryMedia', [$galleryMedia]);

        return parent::removeGalleryMedia($galleryMedia);
    }

    /**
     * {@inheritDoc}
     */
    public function getGalleryMedia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGalleryMedia', []);

        return parent::getGalleryMedia();
    }

    /**
     * {@inheritDoc}
     */
    public function addTag(\Entity\Medialibrary\Tag $tag)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTag', [$tag]);

        return parent::addTag($tag);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTag(\Entity\Medialibrary\Tag $tag)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTag', [$tag]);

        return parent::removeTag($tag);
    }

    /**
     * {@inheritDoc}
     */
    public function getTags()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTags', []);

        return parent::getTags();
    }

    /**
     * {@inheritDoc}
     */
    public function addPublication(\Entity\Medialibrary\Publication $publication)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPublication', [$publication]);

        return parent::addPublication($publication);
    }

    /**
     * {@inheritDoc}
     */
    public function removePublication(\Entity\Medialibrary\Publication $publication)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePublication', [$publication]);

        return parent::removePublication($publication);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublications()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublications', []);

        return parent::getPublications();
    }

}
