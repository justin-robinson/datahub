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
        // setup db connection
        // todo dynamic db connection
        // todo encapsulate pdo logic in classes or use an orm
        $this->db = new \PDO('mysql:host=devdb.bizjournals.int;dbname=datahub', 'web', '');
        $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        // prepare sql statements
        foreach ( $this->sqlStringsArray as $name => $sqlString ) {
            $this->sqlStatementsArray[$name] = $this->db->prepare( $sqlString );
            $this->sqlStatementsArray[$name]->setFetchMode(\PDO::FETCH_ASSOC);
        }
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
    }
}
