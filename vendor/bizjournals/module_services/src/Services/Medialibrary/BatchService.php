<?php

namespace Services\Medialibrary;

use Services\AbstractService;

class BatchService extends AbstractMediaService
{

    public function getList($pubId)
    {
        $result = $this->getClient()->get('batch', array(
            'pub_id' => $pubId
        ));

        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['batch'];
        }
    }

    public function get($id)
    {
        $result = $this->getClient()->get('batch', array(
            'id' => $id
        ));

        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['batch'];
        }
    }

}