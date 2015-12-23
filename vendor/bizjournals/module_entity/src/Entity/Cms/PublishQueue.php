<?php

namespace Entity\Cms;

/**
 * PublishQueue
 */
class PublishQueue extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $queue_id;

    /**
     * @var integer
     */
    private $content_id;

    /**
     * @var integer
     */
    private $version;

    /**
     * @var string
     */
    private $action = 'publish';

    /**
     * @var \DateTime
     */
    private $run_at;

    /**
     * @var string
     */
    private $queued_by;

    /**
     * @var \DateTime
     */
    private $queued_at;

    /**
     * @var boolean
     */
    private $is_complete = 0;

    /**
     * @var \DateTime
     */
    private $completed_at;

    /**
     * @var boolean
     */
    private $has_succeeded = 0;

    /**
     * @var boolean
     */
    private $has_failed = 0;

    /**
     * @var boolean
     */
    private $is_overridden = 0;

    /**
     * @var integer
     */
    private $override_auditlog_id;

    /**
     * @var \Entity\Cms\Content
     */
    private $Content;


    /**
     * Get queueId
     *
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queue_id;
    }

    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return PublishQueue
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return integer
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * Set version
     *
     * @param integer $version
     *
     * @return PublishQueue
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return PublishQueue
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set runAt
     *
     * @param \DateTime $runAt
     *
     * @return PublishQueue
     */
    public function setRunAt($runAt)
    {
        $this->run_at = $runAt;

        return $this;
    }

    /**
     * Get runAt
     *
     * @return \DateTime
     */
    public function getRunAt()
    {
        return $this->run_at;
    }

    /**
     * Set queuedBy
     *
     * @param string $queuedBy
     *
     * @return PublishQueue
     */
    public function setQueuedBy($queuedBy)
    {
        $this->queued_by = $queuedBy;

        return $this;
    }

    /**
     * Get queuedBy
     *
     * @return string
     */
    public function getQueuedBy()
    {
        return $this->queued_by;
    }

    /**
     * Set queuedAt
     *
     * @param \DateTime $queuedAt
     *
     * @return PublishQueue
     */
    public function setQueuedAt($queuedAt)
    {
        $this->queued_at = $queuedAt;

        return $this;
    }

    /**
     * Get queuedAt
     *
     * @return \DateTime
     */
    public function getQueuedAt()
    {
        return $this->queued_at;
    }

    /**
     * Set isComplete
     *
     * @param boolean $isComplete
     *
     * @return PublishQueue
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get isComplete
     *
     * @return boolean
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set completedAt
     *
     * @param \DateTime $completedAt
     *
     * @return PublishQueue
     */
    public function setCompletedAt($completedAt)
    {
        $this->completed_at = $completedAt;

        return $this;
    }

    /**
     * Get completedAt
     *
     * @return \DateTime
     */
    public function getCompletedAt()
    {
        return $this->completed_at;
    }

    /**
     * Set hasSucceeded
     *
     * @param boolean $hasSucceeded
     *
     * @return PublishQueue
     */
    public function setHasSucceeded($hasSucceeded)
    {
        $this->has_succeeded = $hasSucceeded;

        return $this;
    }

    /**
     * Get hasSucceeded
     *
     * @return boolean
     */
    public function getHasSucceeded()
    {
        return $this->has_succeeded;
    }

    /**
     * Set hasFailed
     *
     * @param boolean $hasFailed
     *
     * @return PublishQueue
     */
    public function setHasFailed($hasFailed)
    {
        $this->has_failed = $hasFailed;

        return $this;
    }

    /**
     * Get hasFailed
     *
     * @return boolean
     */
    public function getHasFailed()
    {
        return $this->has_failed;
    }

    /**
     * Set isOverridden
     *
     * @param boolean $isOverridden
     *
     * @return PublishQueue
     */
    public function setIsOverridden($isOverridden)
    {
        $this->is_overridden = $isOverridden;

        return $this;
    }

    /**
     * Get isOverridden
     *
     * @return boolean
     */
    public function getIsOverridden()
    {
        return $this->is_overridden;
    }

    /**
     * Set overrideAuditlogId
     *
     * @param integer $overrideAuditlogId
     *
     * @return PublishQueue
     */
    public function setOverrideAuditlogId($overrideAuditlogId)
    {
        $this->override_auditlog_id = $overrideAuditlogId;

        return $this;
    }

    /**
     * Get overrideAuditlogId
     *
     * @return integer
     */
    public function getOverrideAuditlogId()
    {
        return $this->override_auditlog_id;
    }

    /**
     * Set content
     *
     * @param \Entity\Cms\Content $content
     *
     * @return PublishQueue
     */
    public function setContent(\Entity\Cms\Content $content = null)
    {
        $this->Content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Entity\Cms\Content
     */
    public function getContent()
    {
        return $this->Content;
    }
}

