<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

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
     * Get queue_id
     *
     * @return integer 
     */
    public function getQueueId()
    {
        return $this->queue_id;
    }

    /**
     * Set content_id
     *
     * @param integer $contentId
     * @return PublishQueue
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get content_id
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
     * Set run_at
     *
     * @param \DateTime $runAt
     * @return PublishQueue
     */
    public function setRunAt($runAt)
    {
        $this->run_at = $runAt;

        return $this;
    }

    /**
     * Get run_at
     *
     * @return \DateTime 
     */
    public function getRunAt()
    {
        return $this->run_at;
    }

    /**
     * Set queued_by
     *
     * @param string $queuedBy
     * @return PublishQueue
     */
    public function setQueuedBy($queuedBy)
    {
        $this->queued_by = $queuedBy;

        return $this;
    }

    /**
     * Get queued_by
     *
     * @return string 
     */
    public function getQueuedBy()
    {
        return $this->queued_by;
    }

    /**
     * Set queued_at
     *
     * @param \DateTime $queuedAt
     * @return PublishQueue
     */
    public function setQueuedAt($queuedAt)
    {
        $this->queued_at = $queuedAt;

        return $this;
    }

    /**
     * Get queued_at
     *
     * @return \DateTime 
     */
    public function getQueuedAt()
    {
        return $this->queued_at;
    }

    /**
     * Set is_complete
     *
     * @param boolean $isComplete
     * @return PublishQueue
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get is_complete
     *
     * @return boolean 
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set completed_at
     *
     * @param \DateTime $completedAt
     * @return PublishQueue
     */
    public function setCompletedAt($completedAt)
    {
        $this->completed_at = $completedAt;

        return $this;
    }

    /**
     * Get completed_at
     *
     * @return \DateTime 
     */
    public function getCompletedAt()
    {
        return $this->completed_at;
    }

    /**
     * Set has_succeeded
     *
     * @param boolean $hasSucceeded
     * @return PublishQueue
     */
    public function setHasSucceeded($hasSucceeded)
    {
        $this->has_succeeded = $hasSucceeded;

        return $this;
    }

    /**
     * Get has_succeeded
     *
     * @return boolean 
     */
    public function getHasSucceeded()
    {
        return $this->has_succeeded;
    }

    /**
     * Set has_failed
     *
     * @param boolean $hasFailed
     * @return PublishQueue
     */
    public function setHasFailed($hasFailed)
    {
        $this->has_failed = $hasFailed;

        return $this;
    }

    /**
     * Get has_failed
     *
     * @return boolean 
     */
    public function getHasFailed()
    {
        return $this->has_failed;
    }

    /**
     * Set is_overridden
     *
     * @param boolean $isOverridden
     * @return PublishQueue
     */
    public function setIsOverridden($isOverridden)
    {
        $this->is_overridden = $isOverridden;

        return $this;
    }

    /**
     * Get is_overridden
     *
     * @return boolean 
     */
    public function getIsOverridden()
    {
        return $this->is_overridden;
    }

    /**
     * Set override_auditlog_id
     *
     * @param integer $overrideAuditlogId
     * @return PublishQueue
     */
    public function setOverrideAuditlogId($overrideAuditlogId)
    {
        $this->override_auditlog_id = $overrideAuditlogId;

        return $this;
    }

    /**
     * Get override_auditlog_id
     *
     * @return integer 
     */
    public function getOverrideAuditlogId()
    {
        return $this->override_auditlog_id;
    }

    /**
     * Set Content
     *
     * @param \Entity\Cms\Content $content
     * @return PublishQueue
     */
    public function setContent(\Entity\Cms\Content $content = null)
    {
        $this->Content = $content;

        return $this;
    }

    /**
     * Get Content
     *
     * @return \Entity\Cms\Content 
     */
    public function getContent()
    {
        return $this->Content;
    }
}
