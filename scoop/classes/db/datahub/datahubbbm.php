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
        /**
     * Save this instance to the database
     * @return bool
     */
    public function saveFromImport () {

        // @todo just call a normal save

        // validate if we want
        if( method_exists( $this, 'validate' ) ) {
            $this->validate();
        }

        list($columnNames, $values, $queryParams, $updateColumnValues) =
            $this->get_sql_insert_values();

        // build sql statement
        $sql =
            "INSERT INTO
          " . static::get_sql_table_name() . "
          ({$columnNames})
          VALUES
          ({$values})";

        // update values if we are resaving to the db
        if( $this->loadedFromDb ) {
            $sql .= "
            ON DUPLICATE KEY UPDATE {$updateColumnValues}";
        }

        // execute sql statement
        $result = static::query( $sql, $queryParams );

        // log change on success
        if( $result ) {

            // get auto incremented id if one was generated
            if( $ID = self::$connection->get_insert_id() ) {

                $this->__set( static::AUTO_INCREMENT_COLUMN, $ID );
            }

            $this->loaded_from_database();
        }

        return true;
    }
}

?>
