<?php
namespace Services\Circ;

use Services\AbstractService;

class CircApiService extends AbstractService
{

    public function validateAddress($data)
    {
        $response = $this->client->post('/servlet/getaddress',$data);
        $result = simplexml_load_string($response);
        $name = $result->getName();
        if ($name == 'SUCCESS') {
            return true;
        }
        return false;
    }
}
