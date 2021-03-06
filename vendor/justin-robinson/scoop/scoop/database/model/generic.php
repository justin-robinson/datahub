<?php

namespace Scoop\Database\Model;

use Scoop\Config;
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
    protected static $dBColumnDefaultValuesArray = [ ];

    /**
     * @var array
     */
    protected static $dBColumnPropertiesArray = [ ];

    /**
     * instance specific model values
     */
    protected $dBValuesArray = [ ];

    /**
     * @var bool
     */
    protected $loadedFromDb = false;

    /**
     * @var array
     */
    protected $originalDbValuesArray;

    /**
     * @var Connection
     */
    public static $connection;

    /**
     * Generic constructor.
     *
     * @param array $dataArray
     */
    public function __construct ( array $dataArray = [ ] ) {

        $this->populate ( $dataArray );

    }

    public static function connect () {

        if ( is_null(self::$connection) ) {
            self::$connection = new Connection(Config::get_db_config());
        }
    }

    /**
     * run a raw sql query
     *
     * @param                 $sql
     * @param array           $queryParams
     * @param Connection|null $connection
     *
     * @return bool|int|Rows
     */
    public static function query ( $sql, $queryParams = [], Connection $connection = null ) {

        if ( $connection === null ) {
            self::connect();
            $connection = self::$connection;
        }

        $result = $connection->execute ( $sql, $queryParams );

        // format the data if it was a select
        if ( $result && !empty( $result->num_rows ) ) {

            // create a container for the rows
            $rows = new Rows();

            // put all rows in the collection
            foreach ( $result as $row ) {

                // add a new instance of this row to the collection
                $rows->add_row ( ( new static( $row ) )->set_loaded_from_database(true) );

            }

        } else if ( $connection->get_affected_rows () >= 1 ) {
            $rows = $connection->get_affected_rows ();
        } else {
            $rows = false;
        }

        if ( method_exists ( $result, 'free' ) ) {
            $result->free ();
        }

        return $rows;

    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get ( $name ) {

        return array_key_exists($name, $this->dBValuesArray) ? $this->dBValuesArray[$name] : null;
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
     * @param $name
     * @param $value
     */
    public function __set ( $name, $value ) {

        $this->dBValuesArray[$name] = $value;
    }

    /**
     * @return string
     */
    public function __toString () {
        return var_export($this->dBValuesArray, true);
    }

    /**
     * @return array
     */
    public function get_column_names () {

        return array_keys ( $this->dBValuesArray );
    }

    /**
     * get column names of the model
     * @return array
     */
    public function get_db_values_array () {

        return $this->dBValuesArray;
    }

    /**
     * @return bool
     */
    public function get_loaded_from_database () {

        return $this->loadedFromDb;
    }

    /**
     * @param bool $loadedFromDb
     * @return $this
     */
    public function set_loaded_from_database ($loadedFromDb = true) {

        if ( $this->loadedFromDb = $loadedFromDb ) {
            $this->originalDbValuesArray = $this->dBValuesArray;
        }

        return $this;
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
     * @return array
     */
    public function to_array () {

        return $this->dBValuesArray;
    }

    /**
     * JsonSerializable
     */
    /**
     * @return array
     */
    public function jsonSerialize () {

        return $this->dBValuesArray;
    }

}
