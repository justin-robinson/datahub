<?php

namespace Entity\Bzjpreview;

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
     * @var \Entity\Bzjpreview\Pulse
     */
    private $Pulse;


    /**
     * Get refId
     *
     * @return integer
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseCrossref
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulseId
     *
     * @return integer
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set refType
     *
     * @param string $refType
     *
     * @return PulseCrossref
     */
    public function setRefType($refType)
    {
        $this->ref_type = $refType;

        return $this;
    }

    /**
     * Get refType
     *
     * @return string
     */
    public function getRefType()
    {
        return $this->ref_type;
    }

    /**
     * Set refKey
     *
     * @param string $refKey
     *
     * @return PulseCrossref
     */
    public function setRefKey($refKey)
    {
        $this->ref_key = $refKey;

        return $this;
    }

    /**
     * Get refKey
     *
     * @return string
     */
    public function getRefKey()
    {
        return $this->ref_key;
    }

    /**
     * Set refValue
     *
     * @param string $refValue
     *
     * @return PulseCrossref
     */
    public function setRefValue($refValue)
    {
        $this->ref_value = $refValue;

        return $this;
    }

    /**
     * Get refValue
     *
     * @return string
     */
    public function getRefValue()
    {
        return $this->ref_value;
    }

    /**
     * Set refWeight
     *
     * @param integer $refWeight
     *
     * @return PulseCrossref
     */
    public function setRefWeight($refWeight)
    {
        $this->ref_weight = $refWeight;

        return $this;
    }

    /**
     * Get refWeight
     *
     * @return integer
     */
    public function getRefWeight()
    {
        return $this->ref_weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseCrossref
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
     * @return PulseCrossref
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return PulseCrossref
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bzjpreview\Pulse $pulse
     *
     * @return PulseCrossref
     */
    public function setPulse(\Entity\Bzjpreview\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bzjpreview\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}

