<?php

namespace Console\DB\Query;

use Console\DB\Error\BufferException;

/**
 * Buffers multiple pdo db inserts into one large insert statement
 *
 * EX:
 * <?php
 *
 * // how many inserts we will do at once
 * $limit = 1000;
 *
 * // the table we are inserting into
 * $table = 'datahub.company';
 *
 * // names and values of columns to insert
 * $columnNames = [
 *     'id'          => '?',
 *     'city'        => '?',
 *     'state'       => '?',
 *     'created_at'  => 'NOW()',
 *     'updated_at'  => 'NOW()',
 *     'deleted_at'  => 0,
 * ];
 *
 * // create the buffer
 * $buffer = new Buffer($limit, $table, $columnNames, $sqlValuesTemplate);
 *
 * // do some inserts
 * foreach ( range(0,10500) as $i ) {
 *
 *     // buffer with flush to the db every 1000 inserts
 *
 *     // buffer this insert
 *     $buffer->insert([
 *         $i,
 *         'Charlotte',
 *         'North Carolina'
 *     ]);
 * }
 *
 * // still 500 inserts left in buffer, so we need to manually flush
 * $buffer->flush();
 *
 * ?>
 *
 * Class Buffer
 * @package Console\DB\Query
 */
class Buffer {

    /**
     * @var string[]
     */
    private $buffer;

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
    private $sqlValues;

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
     * @param      $columns       string[]
     */

    public function __construct ( $bufferLimit, \PDO $db, $table, array $columns) {

        $this->bufferLimit = $bufferLimit;
        $this->db = $db;
        $this->table = $table;
        $this->columnNames = implode( ',', array_keys($columns) );
        $this->sqlValuesTemplate = '(' . implode( ',', $columns ) . ')';

        $this->reset();
    }

    /**
     * Buffers the insertion values and flushes the buffer if it has grown too large
     *
     * NOTE: the order of $columnValues must match the order of $this->columnNames
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
            "INSERT INTOaa
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
     * Destructively clears the buffer's content
     */
    private function reset () {

        $this->bufferSize = 0;
        $this->buffer = [ ];
        $this->sqlValues = '';
    }

}
