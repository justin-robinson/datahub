<?php

namespace Services\RabbitMQ;

use PhpAmqpLib\Message\AMQPMessage;

class ElasticSearchService extends AbstractService
{
    /**
     * @var string
     */
    protected $queue = 'elasticsearch';
    
    /**
     * @var string
     */
    protected $exchange = 'elasticsearch';
    
    /**
     * @var string
     */
    protected $routingKey = 'elasticsearch';
    
    /**
     * @var bool
     */
    protected $waitForAcks = true;
    
    /**
     * Initialize channel and exchange/queue
     * 
     * @return  AbstractService
     */
    public function init()
    {
        $this->channel->set_nack_handler(array($this, 'nackHandler'));
        $this->channel->confirm_select();
        
        $this->channel->exchange_declare($this->exchange, 'fanout', false, true, false, false);
    }
    
    /**
     * Build string to create document in ElasticSearch
     * 
     * @link    http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/docs-bulk.html
     * @param   array $actionOptions
     * @param   array $document
     */
    public function createDocument(array $actionOptions, array $document)
    {
        $body = json_encode(array('create' => $actionOptions)) . "\n" . json_encode($document) . "\n";
        
        $this->sendMessage($body);
    }
    
    /**
     * Build string to update document in ElasticSearch
     *
     * @link    http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/docs-bulk.html
     * @param   array $actionOptions
     * @param   array $document
     */
    public function updateDocument(array $actionOptions, array $document)
    {
        $body = json_encode(array('update' => $actionOptions)) . "\n" . json_encode(array('doc' => $document)) . "\n";
    
        $this->sendMessage($body);
    }
    
    /**
     * Build string to delete document in ElasticSearch
     *
     * @link    http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/docs-bulk.html
     * @param   array $actionOptions
     * @param   array $document
     */
    public function deleteDocument(array $actionOptions)
    {
        $body = json_encode(array('delete' => $actionOptions)) . "\n";
    
        $this->sendMessage($body);
    }
    
    /**
     * Throw exception if the channel returns a nack
     * 
     * @param   AMQPMessage $message
     * @throws  \Services\Exception\RuntimeException
     */
    public function nackHandler(AMQPMessage $message)
    {
        throw new \Services\Exception\RuntimeException('AMQP Nack recieved');
    }
}
