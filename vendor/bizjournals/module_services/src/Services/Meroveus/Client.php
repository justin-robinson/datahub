<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 9:42 AM
 */

namespace Services\Meroveus;

use Services\AbstractClient;

require_once 'vendor/legendarydata/meroveusclient.php';

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
    protected $_validModes = [
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
// @todo set up a config
//    public function __construct(array $options = array())
//    {
//        $this->setOptions(array_merge($this->_getConfig(), $options));
//        MeroveusClient::$meroveus = MeroveusClient::$meroveusRoot = $this->getOption('path');
//    }

    /**
     * @param $mode
     * @param $market_code
     * @param array $params
     * @return mixed|null
     * @throws Core_Exception
     */


    // @todo use config
    public function sendRequest($mode = "SEARCH", array $params = [])
    {
        $return = null;
        $mode   = strtoupper($mode);
        if (in_array($mode, $this->_validModes)) {
            $sendArray = $params + [
                    'AKEY' => 'dJoJubaKc2sGEyVWvg3h6ICUC',
                    'EKEY' => 'UdHuwsJhWgyhMWhpBAxkmydnT',
                    'MODE' => $mode,
                ];
            $resp      = MeroveusClient::sendRequest(json_encode($sendArray),
                in_array($mode, ['LABELSEARCH', 'FIELDSEARCH']));
            $return    = (in_array(substr($resp, 0, 1), ['{', '[']) ? json_decode($resp, true) : $resp);
        } else {
            throw new Core_Exception('Invalid Meroveous Mode');
        }

        return $return;
    }

}
