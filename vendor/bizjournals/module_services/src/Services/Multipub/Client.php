<?php

namespace Services\Multipub;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;

class Client extends AbstractClient
{
    /** 
     * Reformat the response (is recursive)
     *  - Move XML attrbutes into regular array elements
     *  - Set the value of empty elements to null
     *  - Set known boolean fields to actual boolean values
     * 
     * @access private
     * @param array $data
     * @param string $parent
     * @return array
     */
    private function moveAttributes($data, $parent)
    {
        $newdata = array();
        foreach ($data as $key => $struct) {
            if (is_int($key)) {
                $data[$key] = $this->moveAttributes($struct, $parent);
            } elseif ($key == '@attributes') {
                foreach ($struct as $skey => $svalue) {
                    $newdata[$parent . '_' . strtoupper($skey)] = ($skey == 'id' ? intval($svalue) : $svalue);
                    unset($data[$key]);
                }
            } elseif (is_array($struct)) {
                if (count($struct) == 0) { 
                    $data[$key] = null;
                } else {
                    $data[$key] = $this->moveAttributes($struct, (is_int($key) ? $parent : $key));
                }
            } elseif (is_string($struct)) {
                switch ($struct) {
                    case 'TRUE':
                        $data[$key] = true;
                        break;
                    case 'FALSE':
                        $data[$key] = false;
                        break;
                    case '1':
                    case 'Y':
                    case '0':
                    case 'N':
                        if (in_array($key, array('ISTEMP'))) {
                            $data[$key] = (in_array($struct, array('1', 'Y')) ? true : false);
                        }
                        break;
                }
            }
        }
        if ($parent == '') {
            if (isset($data['SUBSCRIBER']['ORDER']['ORDER_ID'])) {
                $data['SUBSCRIBER']['ORDER'] = array($data['SUBSCRIBER']['ORDER']);
            }
        }
        return $newdata + $data;
    }

    /** 
     * Post to the lookup API to find a subscriber record
     * 
     * @access public
     * @param array $params
     * @return array
     */
    public function post(array $params = array())
    {
        $request = new HttpRequest();
        $request->setUri($this->base_url);
        $request->getPost()->fromArray($params);
        $request->setMethod('POST');
        
        $response = $this->getHttpClient()
            ->setEncType(HttpClient::ENC_URLENCODED)
            ->send($request);
        
        $this->validate($response);
        $xml   = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $data = json_decode(json_encode((array) $xml), true);
        if (isset($data[0])) {
            $error_parts = explode(':', $data[0]);
            $data = array(
                'ERROR' => array('CODE' => $error_parts[0], 'MESSAGE' => $error_parts[1]),
            );
        } else {
            $data = $this->moveAttributes($data, '');
        }
        return $data;
    }
}
