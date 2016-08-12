<?php

namespace DB\Datahub;

/**
 * Class Top25List
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/08/11
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class Top25List extends \DBCore\Datahub\Top25List {
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