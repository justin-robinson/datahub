<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseCrossref
 */
class PulseCrossref extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $ref_id;

    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var string
     */
    private $ref_type;

    /**
     * @var string
     */
    private $ref_key;

    /**
     * @var string
     */
    private $ref_value;

    /**
     * @var integer
     */
    private $ref_weight;

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
    private $deleted_at;

    /**
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;


    /**
     * Get ref_id
     *
     * @return integer 
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return PulseCrossref
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulse_id
     *
     * @return integer 
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set ref_type
     *
     * @param string $refType
     * @return PulseCrossref
     */
    public function setRefType($refType)
    {
        $this->ref_type = $refType;

        return $this;
    }

    /**
     * Get ref_type
     *
     * @return string 
     */
    public function getRefType()
    {
        return $this->ref_type;
    }

    /**
     * Set ref_key
     *
     * @param string $refKey
     * @return PulseCrossref
     */
    public function setRefKey($refKey)
    {
        $this->ref_key = $refKey;

        return $this;
    }

    /**
     * Get ref_key
     *
     * @return string 
     */
    public function getRefKey()
    {
        return $this->ref_key;
    }

    /**
     * Set ref_value
     *
     * @param string $refValue
     * @return PulseCrossref
     */
    public function setRefValue($refValue)
    {
        $this->ref_value = $refValue;

        return $this;
    }

    /**
     * Get ref_value
     *
     * @return string 
     */
    public function getRefValue()
    {
        return $this->ref_value;
    }

    /**
     * Set ref_weight
     *
     * @param integer $refWeight
     * @return PulseCrossref
     */
    public function setRefWeight($refWeight)
    {
        $this->ref_weight = $refWeight;

        return $this;
    }

    /**
     * Get ref_weight
     *
     * @return integer 
     */
    public function getRefWeight()
    {
        return $this->ref_weight;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseCrossref
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
     * @return PulseCrossref
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
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return PulseCrossref
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set Pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     * @return PulseCrossref
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get Pulse
     *
     * @return \Entity\Bizj\Pulse 
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}
