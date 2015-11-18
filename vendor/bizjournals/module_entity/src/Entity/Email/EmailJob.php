<?php

namespace Entity\Email;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailJob
 */
class EmailJob extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $from_field;

    /**
     * @var string
     */
    private $reply_to;

    /**
     * @var string
     */
    private $sender_host;

    /**
     * @var integer
     */
    private $send_priority;

    /**
     * @var integer
     */
    private $message_count;

    /**
     * @var integer
     */
    private $message_sent_count;

    /**
     * @var \DateTime
     */
    private $c_time;


    /**
     * Get job_id
     *
     * @return integer 
     */
    public function getJobId()
    {
        return $this->job_id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EmailJob
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return EmailJob
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
     * Set from_field
     *
     * @param string $fromField
     * @return EmailJob
     */
    public function setFromField($fromField)
    {
        $this->from_field = $fromField;

        return $this;
    }

    /**
     * Get from_field
     *
     * @return string 
     */
    public function getFromField()
    {
        return $this->from_field;
    }

    /**
     * Set reply_to
     *
     * @param string $replyTo
     * @return EmailJob
     */
    public function setReplyTo($replyTo)
    {
        $this->reply_to = $replyTo;

        return $this;
    }

    /**
     * Get reply_to
     *
     * @return string 
     */
    public function getReplyTo()
    {
        return $this->reply_to;
    }

    /**
     * Set sender_host
     *
     * @param string $senderHost
     * @return EmailJob
     */
    public function setSenderHost($senderHost)
    {
        $this->sender_host = $senderHost;

        return $this;
    }

    /**
     * Get sender_host
     *
     * @return string 
     */
    public function getSenderHost()
    {
        return $this->sender_host;
    }

    /**
     * Set send_priority
     *
     * @param integer $sendPriority
     * @return EmailJob
     */
    public function setSendPriority($sendPriority)
    {
        $this->send_priority = $sendPriority;

        return $this;
    }

    /**
     * Get send_priority
     *
     * @return integer 
     */
    public function getSendPriority()
    {
        return $this->send_priority;
    }

    /**
     * Set message_count
     *
     * @param integer $messageCount
     * @return EmailJob
     */
    public function setMessageCount($messageCount)
    {
        $this->message_count = $messageCount;

        return $this;
    }

    /**
     * Get message_count
     *
     * @return integer 
     */
    public function getMessageCount()
    {
        return $this->message_count;
    }

    /**
     * Set message_sent_count
     *
     * @param integer $messageSentCount
     * @return EmailJob
     */
    public function setMessageSentCount($messageSentCount)
    {
        $this->message_sent_count = $messageSentCount;

        return $this;
    }

    /**
     * Get message_sent_count
     *
     * @return integer 
     */
    public function getMessageSentCount()
    {
        return $this->message_sent_count;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return EmailJob
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }
}
