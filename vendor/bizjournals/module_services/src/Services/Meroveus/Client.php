<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 9:42 AM
 */

namespace Services\Meroveus;

require_once 'vendor/legendarydata/meroveusclient.php';

use \MeroveusClient;
use \Services\AbstractClient;
use \Core_Exception;
use Zend\Http\Request;

class Client extends AbstractClient
{

    /**
     * Options array
     * @var array
     */
    protected $_options;

    /**
     * Config array
     * @staticvar array
     */
    protected static $_config;

    /**
     * Modes array
     * @var array
     */
    private $_validModes = [
        //"ACTIONSEARCH",
        //"ADMINSEARCH",
        //"APPROVE",
        //"CONTACTBUILD",
        //"CONTACTDOWNLOAD",
        //"CONTACTSEARCH",
        //"DOWNLOAD",
        //"EXPORT",
        //"EXPORTUPDATE",
        "FIELDSEARCH",
        //"JOBCANCEL",
        //"JOBSEARCH",
        //"JOBSTATUS",
        //"JOBUPDATE",
        "LABELSEARCH",
        "LISTSEARCH",
        //"LISTUPDATE",
        "LOGSEARCH",
        "LOOKUP",
        //"MAIL",
        //"MAILSEARCH",
        //"MAILTEST",
        //"PUBLISH",
        //"QREPLYUPDATE",
        //"QSEARCH",
        "RANKSEARCH",
        //"REVIEW",
        "REVIEWSEARCH",
        //"TASKSEARCH",
        //"TASKUPDATE",
        //"UPDATE",
        "SEARCH",
        "SUBMIT",
    ];

    /**
     * @var string
     */
    private $akey;

    /**
     * @var string
     */
    private $ekey;

    /**
     * @var
     */
    private $listData;

    /**
     * @var
     */
    private $companyService;


    /**
     * Client constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->setOptions(array_merge($this->_getConfig(), $options));
        MeroveusClient::$meroveus = MeroveusClient::$meroveusRoot = $this->getOption('path');
        $this->akey               = 'dJoJubaKc2sGEyVWvg3h6ICUC';
        $this->ekey               = 'UdHuwsJhWgyhMWhpBAxkmydnT';
    }

    /**
     * Send a request to meroveus
     *
     * @access public
     * @param string $mode
     * @param string $market_code
     * @param array $params
     * @throws Core_Exceptionfunction
     * @return array
     */
    public function send($mode, $market_code, array $params = [])
    {
        $return = null;
        $mode   = strtoupper($mode);
        if (in_array($mode, $this->_validModes)) {
            $sendArray = $params + [
                    'AKEY' => $this->akey,
                    'EKEY' => $this->ekey,
                    'MODE' => $mode,
                ];
            $resp   = MeroveusClient::sendRequest(json_encode($sendArray), in_array($mode, ['LABELSEARCH', 'FIELDSEARCH']));
            $return = (in_array(substr($resp, 0, 1), ['{', '[']) ? json_decode($resp, true) : $resp);
        } else {
            //@todo figure out the right way to do this
            //throw new Core_Exception('Invalid Meroveous Mode');
        }

        return $return;
    }

    /**
     * Set options
     * @param array $options Options array
     * @access public
     * @return $this
     */
    public function setOptions(array $options = [])
    {
        $this->_options = $options;

        return $this;
    }

    /**
     * Get options
     * @return array $this->_options
     * @access public
     * @return $this
     */
    public function getOptions()
    {
        if (!is_array($this->_options)) {
            $this->_options = [];
        }

        return $this->_options;
    }

    /**
     * Set an option
     *
     * @param string $name Key name
     * @param string $value Key value
     * @access public
     * @return $this
     */
    public function setOption($name, $value)
    {
        $this->_options[$name] = $value;

        return $this;
    }

    /**
     * Get an option
     *
     * @param string $name Key name
     * @param string $default
     * @return string option value
     * @access public
     */
    public function getOption($name, $default = null)
    {
        if (isset($this->_options[$name])) {
            return $this->_options[$name];
        }

        return $default;
    }

    /**
     * Get Config settings
     *
     * @access private
     * @return array $this->_config
     */
    private function _getConfig()
    {
        if (!is_array(self::$_config)) {
            self::setConfig();
        }

        return self::$_config;
    }

    /**
     * Set Config settings
     *
     * @access public
     * @static
     * @param array $configOptions
     * @return void
     */
    public static function setConfig(array $configOptions = [])
    {
        if (!is_array(self::$_config)) {
            self::$_config = [];
        }
        $defaults      = [
            'timeout' => 1,
        ];
        self::$_config = array_merge($defaults, self::$_config, $configOptions);
    }

}