<?php

namespace Services\RabbitMQ;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Zend\Stdlib\InitializableInterface;

abstract class AbstractService implements InitializableInterface
{
    /**
     * @var AMQPConnection
     */
    protected $connection;
    
    /**
     * @var AMQPChannel
     */
    protected $channel;
    
    /**
     * @var string
     */
    protected $queue = '';
    
    /**
     * @var string
     */
    protected $exchange = '';
    
    /**
     * @var string
     */
    protected $routingKey = '';
    
    /**
     * @var bool
     */
    protected $waitForAcks = false;
    
    /**
     * Constructor
     * 
     * @param AMQPConnection $connection
     */
    public function __construct(AMQPConnection $connection)
    {
        $this->connection = $connection;
        $this->channel    = $connection->channel();
        
        $this->init();
    }
    
    /**
     * Create and send message to rabbitMQ
     * 
     * @param   mixed $body
     */
    public function sendMessage($body)
    {
        $message = new AMQPMessage($body);
        $this->channel->basic_publish($message, $this->exchange, $this->routingKey);
        
        if ($this->waitForAcks) {
            $this->channel->wait_for_pending_acks();
        }
    }
}
