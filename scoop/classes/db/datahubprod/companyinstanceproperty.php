<?php

namespace DB\DatahubProd;

/**
 * Class CompanyInstanceProperty
 * @package DB\DatahubProd
 * @author jrobinson (robotically)
 * @date 2016/09/12
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstanceProperty extends \DBCore\DatahubProd\CompanyInstanceProperty {

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if ( $name === 'value' ) {

            $this->valueMd5 = md5($value);
        }

        parent::__set($name, is_scalar($value) ? utf8_encode($value) : $value);
    }

}

?>
