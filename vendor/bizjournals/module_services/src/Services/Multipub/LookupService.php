<?php

namespace Services\Multipub;

use Services\AbstractService;

class LookupService extends AbstractService
{
    /**
     * @var array
     */
    protected $subidcache = array();

    /**
     * This method is used to pad subscriber numbers to conform with the 9 digit format.
     *
     * Required for service calls that usually use user input like identity and lookup.
     *
     * @param $tuid
     * @return unknown_type
     */
    private function padTuid($id)
    {
        if (strlen($id) < 9) {
            $id .= '0'; // check digit
        }
        return str_pad($id, 9, '0', STR_PAD_LEFT);
    }

    /**
     * Get subscription information for a sub id
     *
     * A single-item array is returned.   If the array key is SUBSCRIBER, the subscriber was
     * found.   If the array key is ERROR, an error occurred, including an invalid sub id.
     *
     * @access public
     * @param integer $subid
     * @return array
     */
    public function getSubscriberData($subid, $lookupColumn = 'subid')
    {
        $return = false;
        if (isset($this->subidcache[$subid])) {
            $return = $this->subidcache[$subid];
        } else {
            $params = array(
                $lookupColumn     => ($lookupColumn == 'subid' ? $this->padTuid(intval($subid)) : $subid),
            );
            $return = $this->getClient()->post($params);
            if (isset($return['SUBSCRIBER'])) {
                $this->subidcache[$subid] = $return;
            }
        }
        return $return;
    }

    /**
     * Get subscription information for a sub id
     *
     * A single-item array is returned.   If the array key is ORDER, the order was
     * found.   If the array key is ERROR, an error occurred, including an invalid sub id.
     *
     * @access public
     * @param integer $subid
     * @return array
     */
    public function getSubscriberOrder($subid, $pubid)
    {
        $data = $this->getSubscriberData($subid);
        $billing_data = (isset($data['SUBSCRIBER']) ? $data['SUBSCRIBER'] : null);
        unset($billing_data['ORDER']);
        $current_match = null;
        $current_enddate = '00000000';
        if (isset($data['SUBSCRIBER']['ORDER'])) {
            foreach ($data['SUBSCRIBER']['ORDER'] as $order) {
                if ($order['PUBID'] == $pubid) {
                    if (empty($current_match) || $current_enddate < str_replace('-', '', $order['ENDDATE'])) {
                        $current_match = $order;
                        $current_enddate = (isset($current_match['ENDDATE']) ? str_replace('-', '', $current_match['ENDDATE']) : '00000000');
                    }
                }
            }
        }
        if (empty($current_match)) {
            if (!isset($data['ERROR'])) {
                $data['ERROR'] = array('CODE' => 11, 'MESSAGE' => 'No subscriber order found.');
            }
            return $data;
        }
        $current_match['SUBSCRIBER'] = $billing_data;
        return array('ORDER' => $current_match);
    }
}
