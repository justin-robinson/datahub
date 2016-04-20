<?php

namespace Console\DB\Query;

use Console\DB\Error\BufferException;

/**
 * Class Buffer
 * @package Console\DB\Query
 */
class Buffer {

    /**
     * @var string[]
     */
    private $buffer = [ ];

    /**
     * The size of the buffer to trigger an insert
     * @var int
     */
    private $bufferLimit;

    /**
     * How many inserts are currently buffered
     * @var int
     */
    private $bufferSize;

    /**
     * @var string[]
     */
    private $columnNames;

    /**
     * @var \PDO
     */
    private $db;

    /**
     * @var string
     */
    private $table;

    /**
     * sql to insert all buffered inserts
     * @var string
     */
    private $sqlValues = '';

    /**
     * sql used to insert a single row
     * @var string
     */
    private $sqlValuesTemplate;

    /**
     * Buffer constructor.
     *
     * @param      $bufferLimit       int
     * @param      $db                \PDO
     * @param      $table             string
     * @param      $columnNames       string[]
     * @param null $sqlValuesTemplate string
     */
    public function __construct ( $bufferLimit, \PDO $db, $table, array $columnNames, $sqlValuesTemplate = null ) {

        $this->bufferLimit = $bufferLimit;
        $this->db = $db;
        $this->table = $table;
        $this->columnNames = implode( ',', $columnNames );

        // if no values template was given create one
        // ( ?, ?, ?)
        if( $sqlValuesTemplate === null ) {
            $sqlValuesTemplate = '(' . implode( ',', array_fill( 0, count( $columnNames ), '?' ) ) . ')';
        }
        $this->sqlValuesTemplate = $sqlValuesTemplate;

        $this->reset();
    }

    /**
     * Buffers the insertion values and flush the buffer if it has grown too large
     *
     * @param $columnValues
     */
    public function insert ( $columnValues ) {

        // add new values to the buffer
        $this->buffer = array_merge( $this->buffer, $columnValues );

        // increment buffer size
        $this->bufferSize++;

        // add to the sql values string
        $this->sqlValues .= $this->sqlValuesTemplate . ',';

        // flush if buffer is too large
        if( $this->bufferSize >= $this->bufferLimit ) {
            $this->flush();
        }
    }

    /**
     * Flushes the buffer to the db
     */
    public function flush () {

        if( $this->bufferSize === 0 ) {
            return;
        }

        //  remove trailing commas from built sql values
        $this->sqlValues = rtrim( $this->sqlValues, ',' );

        // build insert statement
        $sql =
            "INSERT INTO
              {$this->table}(
                {$this->columnNames}  
              )
              VALUES
              {$this->sqlValues}
            ";

        // prepare the sql
        $preparedSql = $this->db->prepare( $sql );
        if( !$preparedSql ) {
            throw new BufferException( var_export( $this->db->errorInfo() ) );
        }

        // INSERT
        $preparedSql->execute( $this->buffer );

        // reset the buffer
        $this->reset();
    }

    /**
     * Resets the buffer
     */
    private function reset () {

        $this->bufferSize = 0;
        $this->buffer = [ ];
        $this->sqlValues = '';
    }

}
