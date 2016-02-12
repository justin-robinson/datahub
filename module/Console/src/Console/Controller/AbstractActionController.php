<?php

namespace Console\Controller;

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
     * @var \PDO
     */
    protected $db;

    /**
     * AbstractActionController constructor.
     */
    public function __construct () {
        // see $this->init()
    }

    /**
     * Register the default events for this controller
     *
     * @return void
     */
    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();

        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'init'), 100);
    }

    public function init(MvcEvent $e)
    {
        $dbConfig = $this->getServiceLocator()->get('Config')['pdo'];
        $this->db = new \PDO(
            'mysql:host='.$dbConfig['host'].';dbname='.$dbConfig['dbname'],
            $dbConfig['usename'],
            $dbConfig['pword']
        );
        $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        // prepare sql statements
        foreach ( $this->sqlStringsArray as $name => $sqlString ) {
            $this->sqlStatementsArray[$name] = $this->db->prepare( $sqlString );
            $this->sqlStatementsArray[$name]->setFetchMode(\PDO::FETCH_ASSOC);
        }
    }
}
