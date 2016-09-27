<?php

namespace DB\Datahub;

/**
 * Class DatasetEntries
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/07/05
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class DatasetEntries extends \DBCore\Datahub\DatasetEntries {
    
    public function __set($name, $value) {
        
        if ( $name === 'meta' && is_string($value)) {
            $value = json_decode($value);
        }
        
        parent::__set($name, $value);
    }

    public function presave() {

        $this->dBValuesArray['meta'] = json_encode($this->meta);
    }
}

?>
