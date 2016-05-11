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

        if ( $setTimestamps ) {

            // set timestamps
            if ( empty($this->createdAt) ) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');

        }
        
        parent::save();
    }

}

?>
