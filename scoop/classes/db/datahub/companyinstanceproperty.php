<?php

namespace DB\Datahub;

/**
 * Class CompanyInstanceProperty
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/09
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstanceProperty extends \DBCore\Datahub\CompanyInstanceProperty {

    /**
     * @param bool $setTimestamps
     */
    public function save ( $setTimestamps = true ) {

        $this->pre_save($setTimestamps);
        
        parent::save();
    }

    /**
     * @param bool $setTimestamps
     */
    public function pre_save ( $setTimestamps = true ) {

        if ( $setTimestamps ) {

            // set timestamps
            if ( empty($this->createdAt) ) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');

        }

        $this->valueMd5 = md5($this->value);
    }

}

?>
