<?php

namespace Console\Controller;

use Console\DB\Connection\DB;
use Console\DB\Error\ConfigException;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
use Zend\Mvc\MvcEvent;

/**
 * Class AbstractActionController
 * @package Console\Controller
 */
abstract class AbstractActionController extends ZendAbstractActionController
{

    /**
     * @var $sqlStatementsArray \PDOStatement[]
     */
    protected $sqlStatementsArray = [];

    /**
     * @var $sqlStringsArray string[]
     */
    protected $sqlStringsArray = [];

    /**
     * @var array
     */
    protected $config;

    /**
     * AbstractActionController constructor.
     */
    public function __construct()
    {
        // see $this->init()
    }

    /**
     * Register the default events for this controller
     * @return void
     */
    protected function attachDefaultListeners()
    {

        parent::attachDefaultListeners();

        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'init'], 100);
    }

    public function init(MvcEvent $e)
    {

        $this->config = $this->getServiceLocator()->get('Config');
    }
}
