<?php

namespace DB\DatahubProd;

/**
 * Class CompanyInstance
 * @package DB\DatahubProd
 * @author jrobinson (robotically)
 * @date 2016/09/12
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstance extends \DBCore\DatahubProd\CompanyInstance {

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {

        parent::__set($name, is_scalar($value) ? utf8_encode($value) : $value);
    }
}

?>
