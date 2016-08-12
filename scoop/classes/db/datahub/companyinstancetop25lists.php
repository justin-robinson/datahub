<?php

namespace DB\Datahub;

/**
 * Class CompanyInstanceTop25lists
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/08/10
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstanceTop25lists extends \DBCore\Datahub\CompanyInstanceTop25lists {
    
    /**
     * @return bool
     */
    public function delete () {

        $primaryKeys = 'listId';

        $sql = "
            DELETE FROM
              " . $this->get_sql_table_name() . "
            WHERE
                {$primaryKeys} = {$this->listId}
        ";

        $result = static::query( $sql );

        if( $result ) {
            $this->loadedFromDb = false;
        }

        return $result;

    }
}

?>