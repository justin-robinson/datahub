<?php

namespace Entity\Medialibrary;

/**
 * Media
 */
class Media extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $md5_hash;

    /**
     * @var integer
     */
    private $media_size = 0;

    /**
     * @var string
     */
    private $category = 'editorial';

    /**
     * @var string
     */
    private $source_file;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var integer
     */
    private $height = 0;

    /**
     * @var integer
     */
    private $width = 0;

    /**
     * @var boolean
     */
    private $is_image = false;

    /**
     * @var string
     */
    private $image_format;

    /**
     * @var string
     */
    private $mime_type;

    /**
     * @var boolean
     */
    private $is_pub_restricted = false;

    /**
     * @var string
     */
    private $copyright_notice;

    /**
     * @var boolean
     */
    private $is_live = false;

    /**
     * @var \DateTime
     */
    private $upload_date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaCrop;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaMetadata;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaLinks;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaTags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UploadBatches;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaPubs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $GalleryMedia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Publications;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MediaCrop = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MediaMetadata = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MediaLinks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MediaTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->UploadBatches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MediaPubs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->GalleryMedia = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Publications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get mediaId
     *
     * @return integer
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set md5Hash
     *
     * @param string $md5Hash
     *
     * @return Media
     */
    public function setMd5Hash($md5Hash)
    {
        $this->md5_hash = $md5Hash;

        return $this;
    }

    /**
     * Get md5Hash
     *
     * @return string
     */
    public function getMd5Hash()
    {
        return $this->md5_hash;
    }

    /**
     * Set mediaSize
     *
     * @param integer $mediaSize
     *
     * @return Media
     */
    public function setMediaSize($mediaSize)
    {
        $this->media_size = $mediaSize;

        return $this;
    }

    /**
     * Get mediaSize
     *
     * @return integer
     */
    public function getMediaSize()
    {
        return $this->media_size;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Media
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set sourceFile
     *
     * @param string $sourceFile
     *
     * @return Media
     */
    public function setSourceFile($sourceFile)
    {
        $this->source_file = $sourceFile;

        return $this;
    }

    /**
     * Get sourceFile
     *
     * @return string
     */
    public function getSourceFile()
    {
        return $this->source_file;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Media
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
     * @return Media
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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return Media
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Media
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Media
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Media
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set isImage
     *
     * @param boolean $isImage
     *
     * @return Media
     */
    public function setIsImage($isImage)
    {
        $this->is_image = $isImage;

        return $this;
    }

    /**
     * Get isImage
     *
     * @return boolean
     */
    public function getIsImage()
    {
        return $this->is_image;
    }

    /**
     * Set imageFormat
     *
     * @param string $imageFormat
     *
     * @return Media
     */
    public function setImageFormat($imageFormat)
    {
        $this->image_format = $imageFormat;

        return $this;
    }

    /**
     * Get imageFormat
     *
     * @return string
     */
    public function getImageFormat()
    {
        return $this->image_format;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return Media
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set isPubRestricted
     *
     * @param boolean $isPubRestricted
     *
     * @return Media
     */
    public function setIsPubRestricted($isPubRestricted)
    {
        $this->is_pub_restricted = $isPubRestricted;

        return $this;
    }

    /**
     * Get isPubRestricted
     *
     * @return boolean
     */
    public function getIsPubRestricted()
    {
        return $this->is_pub_restricted;
    }

    /**
     * Set copyrightNotice
     *
     * @param string $copyrightNotice
     *
     * @return Media
     */
    public function setCopyrightNotice($copyrightNotice)
    {
        $this->copyright_notice = $copyrightNotice;

        return $this;
    }

    /**
     * Get copyrightNotice
     *
     * @return string
     */
    public function getCopyrightNotice()
    {
        return $this->copyright_notice;
    }

    /**
     * Set isLive
     *
     * @param boolean $isLive
     *
     * @return Media
     */
    public function setIsLive($isLive)
    {
        $this->is_live = $isLive;

        return $this;
    }

    /**
     * Get isLive
     *
     * @return boolean
     */
    public function getIsLive()
    {
        return $this->is_live;
    }

    /**
     * Set uploadDate
     *
     * @param \DateTime $uploadDate
     *
     * @return Media
     */
    public function setUploadDate($uploadDate)
    {
        $this->upload_date = $uploadDate;

        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->upload_date;
    }

    /**
     * Add mediaCrop
     *
     * @param \Entity\Medialibrary\MediaCrop $mediaCrop
     *
     * @return Media
     */
    public function addMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {
        $this->MediaCrop[] = $mediaCrop;

        return $this;
    }

    /**
     * Remove mediaCrop
     *
     * @param \Entity\Medialibrary\MediaCrop $mediaCrop
     */
    public function removeMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {
        $this->MediaCrop->removeElement($mediaCrop);
    }

    /**
     * Get mediaCrop
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaCrop()
    {
        return $this->MediaCrop;
    }

    /**
     * Add mediaMetadatum
     *
     * @param \Entity\Medialibrary\MediaMetadata $mediaMetadatum
     *
     * @return Media
     */
    public function addMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadatum)
    {
        $this->MediaMetadata[] = $mediaMetadatum;

        return $this;
    }

    /**
     * Remove mediaMetadatum
     *
     * @param \Entity\Medialibrary\MediaMetadata $mediaMetadatum
     */
    public function removeMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadatum)
    {
        $this->MediaMetadata->removeElement($mediaMetadatum);
    }

    /**
     * Get mediaMetadata
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaMetadata()
    {
        return $this->MediaMetadata;
    }

    /**
     * Add mediaLink
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLink
     *
     * @return Media
     */
    public function addMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {
        $this->MediaLinks[] = $mediaLink;

        return $this;
    }

    /**
     * Remove mediaLink
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLink
     */
    public function removeMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {
        $this->MediaLinks->removeElement($mediaLink);
    }

    /**
     * Get mediaLinks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaLinks()
    {
        return $this->MediaLinks;
    }

    /**
     * Add mediaTag
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTag
     *
     * @return Media
     */
    public function addMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {
        $this->MediaTags[] = $mediaTag;

        return $this;
    }

    /**
     * Remove mediaTag
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTag
     */
    public function removeMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {
        $this->MediaTags->removeElement($mediaTag);
    }

    /**
     * Get mediaTags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaTags()
    {
        return $this->MediaTags;
    }

    /**
     * Add uploadBatch
     *
     * @param \Entity\Medialibrary\BatchMedia $uploadBatch
     *
     * @return Media
     */
    public function addUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatch)
    {
        $this->UploadBatches[] = $uploadBatch;

        return $this;
    }

    /**
     * Remove uploadBatch
     *
     * @param \Entity\Medialibrary\BatchMedia $uploadBatch
     */
    public function removeUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatch)
    {
        $this->UploadBatches->removeElement($uploadBatch);
    }

    /**
     * Get uploadBatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUploadBatches()
    {
        return $this->UploadBatches;
    }

    /**
     * Add mediaPub
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPub
     *
     * @return Media
     */
    public function addMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {
        $this->MediaPubs[] = $mediaPub;

        return $this;
    }

    /**
     * Remove mediaPub
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPub
     */
    public function removeMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {
        $this->MediaPubs->removeElement($mediaPub);
    }

    /**
     * Get mediaPubs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaPubs()
    {
        return $this->MediaPubs;
    }

    /**
     * Add galleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     *
     * @return Media
     */
    public function addGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia[] = $galleryMedia;

        return $this;
    }

    /**
     * Remove galleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     */
    public function removeGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia->removeElement($galleryMedia);
    }

    /**
     * Get galleryMedia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleryMedia()
    {
        return $this->GalleryMedia;
    }

    /**
     * Add tag
     *
     * @param \Entity\Medialibrary\Tag $tag
     *
     * @return Media
     */
    public function addTag(\Entity\Medialibrary\Tag $tag)
    {
        $this->Tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Entity\Medialibrary\Tag $tag
     */
    public function removeTag(\Entity\Medialibrary\Tag $tag)
    {
        $this->Tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     * Add publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     *
     * @return Media
     */
    public function addPublication(\Entity\Medialibrary\Publication $publication)
    {
        $this->Publications[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     */
    public function removePublication(\Entity\Medialibrary\Publication $publication)
    {
        $this->Publications->removeElement($publication);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublications()
    {
        return $this->Publications;
    }
}

