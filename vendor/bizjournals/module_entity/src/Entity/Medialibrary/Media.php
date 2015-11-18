<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Get media_id
     *
     * @return integer 
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set md5_hash
     *
     * @param string $md5Hash
     * @return Media
     */
    public function setMd5Hash($md5Hash)
    {
        $this->md5_hash = $md5Hash;

        return $this;
    }

    /**
     * Get md5_hash
     *
     * @return string 
     */
    public function getMd5Hash()
    {
        return $this->md5_hash;
    }

    /**
     * Set media_size
     *
     * @param integer $mediaSize
     * @return Media
     */
    public function setMediaSize($mediaSize)
    {
        $this->media_size = $mediaSize;

        return $this;
    }

    /**
     * Get media_size
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
     * Set source_file
     *
     * @param string $sourceFile
     * @return Media
     */
    public function setSourceFile($sourceFile)
    {
        $this->source_file = $sourceFile;

        return $this;
    }

    /**
     * Get source_file
     *
     * @return string 
     */
    public function getSourceFile()
    {
        return $this->source_file;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Media
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
     * @return Media
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
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Media
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expires_at
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
     * Set is_image
     *
     * @param boolean $isImage
     * @return Media
     */
    public function setIsImage($isImage)
    {
        $this->is_image = $isImage;

        return $this;
    }

    /**
     * Get is_image
     *
     * @return boolean 
     */
    public function getIsImage()
    {
        return $this->is_image;
    }

    /**
     * Set image_format
     *
     * @param string $imageFormat
     * @return Media
     */
    public function setImageFormat($imageFormat)
    {
        $this->image_format = $imageFormat;

        return $this;
    }

    /**
     * Get image_format
     *
     * @return string 
     */
    public function getImageFormat()
    {
        return $this->image_format;
    }

    /**
     * Set mime_type
     *
     * @param string $mimeType
     * @return Media
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;

        return $this;
    }

    /**
     * Get mime_type
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set is_pub_restricted
     *
     * @param boolean $isPubRestricted
     * @return Media
     */
    public function setIsPubRestricted($isPubRestricted)
    {
        $this->is_pub_restricted = $isPubRestricted;

        return $this;
    }

    /**
     * Get is_pub_restricted
     *
     * @return boolean 
     */
    public function getIsPubRestricted()
    {
        return $this->is_pub_restricted;
    }

    /**
     * Set copyright_notice
     *
     * @param string $copyrightNotice
     * @return Media
     */
    public function setCopyrightNotice($copyrightNotice)
    {
        $this->copyright_notice = $copyrightNotice;

        return $this;
    }

    /**
     * Get copyright_notice
     *
     * @return string 
     */
    public function getCopyrightNotice()
    {
        return $this->copyright_notice;
    }

    /**
     * Set is_live
     *
     * @param boolean $isLive
     * @return Media
     */
    public function setIsLive($isLive)
    {
        $this->is_live = $isLive;

        return $this;
    }

    /**
     * Get is_live
     *
     * @return boolean 
     */
    public function getIsLive()
    {
        return $this->is_live;
    }

    /**
     * Set upload_date
     *
     * @param \DateTime $uploadDate
     * @return Media
     */
    public function setUploadDate($uploadDate)
    {
        $this->upload_date = $uploadDate;

        return $this;
    }

    /**
     * Get upload_date
     *
     * @return \DateTime 
     */
    public function getUploadDate()
    {
        return $this->upload_date;
    }

    /**
     * Add MediaCrop
     *
     * @param \Entity\Medialibrary\MediaCrop $mediaCrop
     * @return Media
     */
    public function addMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {
        $this->MediaCrop[] = $mediaCrop;

        return $this;
    }

    /**
     * Remove MediaCrop
     *
     * @param \Entity\Medialibrary\MediaCrop $mediaCrop
     */
    public function removeMediaCrop(\Entity\Medialibrary\MediaCrop $mediaCrop)
    {
        $this->MediaCrop->removeElement($mediaCrop);
    }

    /**
     * Get MediaCrop
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaCrop()
    {
        return $this->MediaCrop;
    }

    /**
     * Add MediaMetadata
     *
     * @param \Entity\Medialibrary\MediaMetadata $mediaMetadata
     * @return Media
     */
    public function addMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadata)
    {
        $this->MediaMetadata[] = $mediaMetadata;

        return $this;
    }

    /**
     * Remove MediaMetadata
     *
     * @param \Entity\Medialibrary\MediaMetadata $mediaMetadata
     */
    public function removeMediaMetadatum(\Entity\Medialibrary\MediaMetadata $mediaMetadata)
    {
        $this->MediaMetadata->removeElement($mediaMetadata);
    }

    /**
     * Get MediaMetadata
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaMetadata()
    {
        return $this->MediaMetadata;
    }

    /**
     * Add MediaLinks
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLinks
     * @return Media
     */
    public function addMediaLink(\Entity\Medialibrary\MediaLink $mediaLinks)
    {
        $this->MediaLinks[] = $mediaLinks;

        return $this;
    }

    /**
     * Remove MediaLinks
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLinks
     */
    public function removeMediaLink(\Entity\Medialibrary\MediaLink $mediaLinks)
    {
        $this->MediaLinks->removeElement($mediaLinks);
    }

    /**
     * Get MediaLinks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaLinks()
    {
        return $this->MediaLinks;
    }

    /**
     * Add MediaTags
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTags
     * @return Media
     */
    public function addMediaTag(\Entity\Medialibrary\MediaTag $mediaTags)
    {
        $this->MediaTags[] = $mediaTags;

        return $this;
    }

    /**
     * Remove MediaTags
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTags
     */
    public function removeMediaTag(\Entity\Medialibrary\MediaTag $mediaTags)
    {
        $this->MediaTags->removeElement($mediaTags);
    }

    /**
     * Get MediaTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaTags()
    {
        return $this->MediaTags;
    }

    /**
     * Add UploadBatches
     *
     * @param \Entity\Medialibrary\BatchMedia $uploadBatches
     * @return Media
     */
    public function addUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatches)
    {
        $this->UploadBatches[] = $uploadBatches;

        return $this;
    }

    /**
     * Remove UploadBatches
     *
     * @param \Entity\Medialibrary\BatchMedia $uploadBatches
     */
    public function removeUploadBatch(\Entity\Medialibrary\BatchMedia $uploadBatches)
    {
        $this->UploadBatches->removeElement($uploadBatches);
    }

    /**
     * Get UploadBatches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUploadBatches()
    {
        return $this->UploadBatches;
    }

    /**
     * Add MediaPubs
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPubs
     * @return Media
     */
    public function addMediaPub(\Entity\Medialibrary\MediaPub $mediaPubs)
    {
        $this->MediaPubs[] = $mediaPubs;

        return $this;
    }

    /**
     * Remove MediaPubs
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPubs
     */
    public function removeMediaPub(\Entity\Medialibrary\MediaPub $mediaPubs)
    {
        $this->MediaPubs->removeElement($mediaPubs);
    }

    /**
     * Get MediaPubs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaPubs()
    {
        return $this->MediaPubs;
    }

    /**
     * Add GalleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     * @return Media
     */
    public function addGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia[] = $galleryMedia;

        return $this;
    }

    /**
     * Remove GalleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     */
    public function removeGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia->removeElement($galleryMedia);
    }

    /**
     * Get GalleryMedia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGalleryMedia()
    {
        return $this->GalleryMedia;
    }

    /**
     * Add Tags
     *
     * @param \Entity\Medialibrary\Tag $tags
     * @return Media
     */
    public function addTag(\Entity\Medialibrary\Tag $tags)
    {
        $this->Tags[] = $tags;

        return $this;
    }

    /**
     * Remove Tags
     *
     * @param \Entity\Medialibrary\Tag $tags
     */
    public function removeTag(\Entity\Medialibrary\Tag $tags)
    {
        $this->Tags->removeElement($tags);
    }

    /**
     * Get Tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     * Add Publications
     *
     * @param \Entity\Medialibrary\Publication $publications
     * @return Media
     */
    public function addPublication(\Entity\Medialibrary\Publication $publications)
    {
        $this->Publications[] = $publications;

        return $this;
    }

    /**
     * Remove Publications
     *
     * @param \Entity\Medialibrary\Publication $publications
     */
    public function removePublication(\Entity\Medialibrary\Publication $publications)
    {
        $this->Publications->removeElement($publications);
    }

    /**
     * Get Publications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPublications()
    {
        return $this->Publications;
    }
}
