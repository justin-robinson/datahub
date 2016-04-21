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
     * @var \PDO
     */
    protected $db;

    /**
     * @var array
     */
    protected $config;

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
        $this->config = $this->getServiceLocator()->get( 'Config' );

        try{
            $this->db = DB::createPdo(
                $this->config['pdo']['datahub']
            );
        } catch (\PDOException $e){
            die("PDO Error!: " . $e->getMessage().PHP_EOL);
        } catch (ConfigException $e){
            die("PDO Config Error!: " . $e->getMessage() . PHP_EOL);
        }

        // prepare sql statements
        foreach ( $this->sqlStringsArray as $name => $sqlString ) {
            $this->sqlStatementsArray[$name] = $this->db->prepare( $sqlString );
            if (!$this->sqlStatementsArray[$name]) {
                echo PHP_EOL . "PDO::errorInfo():" . PHP_EOL;
                print_r($this->db->errorInfo());
            }
            $this->sqlStatementsArray[$name]->setFetchMode(\PDO::FETCH_ASSOC);
        }
    }
}
