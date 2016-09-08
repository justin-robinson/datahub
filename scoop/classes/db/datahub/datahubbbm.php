<?php

namespace DB\Datahub;

/**
 * Class DatahubBbm
 *
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/09/08
 * @inheritdoc
 *          This file is only generated once
 *          Put your class specific code in here
 */
class DatahubBbm extends \DBCore\Datahub\DatahubBbm
{
    
    public function populate(array $data)
    {
        if (empty ($data)) {
            return $this;
        } else {
            $this->dhInstanceId  = empty($data[0]) ? null : $data[0];
            $this->bbmOrgAddress = empty($data[1]) ? null : $data[1];
            $this->bbmId         = empty($data[2]) ? null : $data[2];
            $this->bbmOrgUrl     = empty($data[3]) ? null : $data[3];
            $this->bbmOrgName    = empty($data[4]) ? null : $data[4];
            $this->bbmOrgCity    = empty($data[5]) ? null : $data[5];
            $this->bbmOrgState   = empty($data[6]) ? null : $data[6];
//            $this->bbmOrgZip     = empty($data[6]) ? null : $data[6];
            return $this;
        }
    }
    
}

?>