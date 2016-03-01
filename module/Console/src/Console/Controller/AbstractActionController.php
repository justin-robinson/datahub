<?php

namespace Console\Controller;

use Doctrine\DBAL\Driver\PDOException;
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
        try{
            $this->db = new \PDO('mysql:host=devdb.bizjournals.int;dbname=datahub', 'web', '');
            $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        } catch (\PDOException $e){
            die("PDO Error!: " . $e->getMessage().PHP_EOL);
        }

        // prepare sql statements
        foreach ( $this->sqlStringsArray as $name => $sqlString ) {
            $this->sqlStatementsArray[$name] = $this->db->prepare( $sqlString );
            $this->sqlStatementsArray[$name]->setFetchMode(\PDO::FETCH_ASSOC);
        }
    }
}
