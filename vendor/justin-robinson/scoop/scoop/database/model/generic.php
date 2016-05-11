<?php

namespace Scoop\Database\Model;

use Scoop\Database\Connection;
use Scoop\Database\Rows;

/**
 * Class Generic
 * @package Scoop\Database\Model
 */
class Generic implements \JsonSerializable {

    /**
     * @var array
     */
    protected static $dBColumnPropertiesArray = [ ];

    /**
     * @var array
     */
    protected static $dBColumnDefaultValuesArray = [ ];

    /**
     * instance specific model values
     */
    protected $dBValuesArray = [ ];

    /**
     * @var array
     */
    protected $orignalDbValuesArray;

    /**
     * @var bool
     */
    protected $loadedFromDb = false;

    /**
     * Generic constructor.
     *
     * @param array $dataArray
     */
    public function __construct ( array $dataArray = [ ] ) {

        $this->populate ( $dataArray );

    }


    /**
     * @return string
     */
    public function __toString () {
        return var_export($this->dBValuesArray, true);
    }

    /**
     * replace object values with passed ones
     *
     * @param $dataArray array
     */
    public function populate ( array $dataArray ) {

        $this->dBValuesArray = array_replace ( $this->dBValuesArray, $dataArray );
    }

    /**
     * run a raw sql query
     *
     * @param       $sql
     * @param array $queryParams
     *
     * @return bool|int|Rows
     * @throws \Exception
     */
    public static function query ( $sql, $queryParams = [ ] ) {

        $result = Connection::execute ( $sql, $queryParams );

        // format the data if it was a select
        if ( $result && !empty( $result->num_rows ) ) {

            // create a container for the rows
            $rows = new Rows();

            // put all rows in the collection
            foreach ( $result as $row ) {

                // add a new instance of this row to the collection
                $rows->add_row ( ( new static( $row ) )->loaded_from_database () );

            }

        } else if ( Connection::get_affected_rows () >= 1 ) {
            $rows = Connection::get_affected_rows ();
        } else {
            $rows = false;
        }

        if ( method_exists ( $result, 'free' ) ) {
            $result->free ();
        }

        return $rows;

    }

    /**
     * Mark this object as loaded from the database
     */
    public function loaded_from_database () {

        $this->loadedFromDb = true;

        $this->orignalDbValuesArray = $this->dBValuesArray;

        return $this;

    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get ( $name ) {

        if ( isset( $this->dBValuesArray[$name] ) ) {
            $property = $this->dBValuesArray[$name];
        } else {
            $property = null;
        }

        return $property;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set ( $name, $value ) {

        $this->dBValuesArray[$name] = $value;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function __isset ( $name ) {

        return isset($this->dBValuesArray[$name]);
    }

    /**
     * @return array
     */
    public function to_array () {

        return $this->dBValuesArray;
    }

    /**
     * @return array
     */
    public function get_column_names () {

        return array_keys ( $this->orignalDbValuesArray );
    }

    /**
     * get column names of the model
     * @return array
     */
    public function get_db_values_array () {

        return $this->dBValuesArray;
    }

    public function get_sql_insert_values () {

        $columns = $this->get_db_values_array ();

        // remove columns marked by the db to be NON NULL but we have them locally as null
        foreach ( static::NON_NULL_COLUMNS as $columnName ) {
            if ( array_key_exists ( $columnName, $columns ) && is_null ( $columns[$columnName] ) ) {
                unset( $columns[$columnName] );
            }
        }

        $columnNames = '';
        $values = '';
        $queryParams = [];
        $updateColumnValues = '';
        foreach ( $columns as $columnName => $value ) {

            // add column name
            $columnNames .= "`{$columnName}`,";
            $updateColumnValues .= "{$columnName}=VALUES({$columnName}),";

            if ( is_object($value) && is_a($value, '\Scoop\Database\Literal') ) {
                $values .= "{$value},";
            } else {
                // value placeholder
                $values .= '?,';

                // value param
                $queryParams[] = $value;
            }
        }

        // remove last comma
        $columnNames = rtrim ( $columnNames, ',' );
        $values = rtrim ( $values, ',' );
        $updateColumnValues = rtrim( $updateColumnValues, ',' );

        return [
            $columnNames,
            $values,
            $queryParams,
            $updateColumnValues,
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize () {

        return $this->dBValuesArray;
    }

}
