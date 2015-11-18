<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * NascarProductMedia
 */
class NascarProductMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $image_type;

    /**
     * @var string
     */
    private $mime_type;

    /**
     * @var integer
     */
    private $file_size;

    /**
     * @var string
     */
    private $file_path;


    /**
     * Set id
     *
     * @param integer $id
     * @return NascarProductMedia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return NascarProductMedia
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get product_id
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set image_type
     *
     * @param string $imageType
     * @return NascarProductMedia
     */
    public function setImageType($imageType)
    {
        $this->image_type = $imageType;

        return $this;
    }

    /**
     * Get image_type
     *
     * @return string 
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Set mime_type
     *
     * @param string $mimeType
     * @return NascarProductMedia
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
     * Set file_size
     *
     * @param integer $fileSize
     * @return NascarProductMedia
     */
    public function setFileSize($fileSize)
    {
        $this->file_size = $fileSize;

        return $this;
    }

    /**
     * Get file_size
     *
     * @return integer 
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * Set file_path
     *
     * @param string $filePath
     * @return NascarProductMedia
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get file_path
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->file_path;
    }
}
