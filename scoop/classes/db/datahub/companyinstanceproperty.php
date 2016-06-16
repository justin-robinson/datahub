<?php

namespace DB\Datahub;
use Scoop\Database\Literal;
use Scoop\Database\Rows;

/**
 * Class CompanyInstanceProperty
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/09
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstanceProperty extends \DBCore\Datahub\CompanyInstanceProperty {

    /**
     * @return bool
     */
    public function delete () {

        if( !$this->loaded_from_database() ) {
            return false;
        }

        $this->deletedAt = new Literal( 'NOW()' );

        return $this->save( false );
    }

    /**
     * @param int    $limit
     * @param int    $offset
     * @param string $where
     * @param array  $queryParams
     *
     * @return bool|int|Rows
     */
    public static function fetch ( $limit = 1000, $offset = 0, $where = '', array $queryParams = [ ] ) {

        $where .= empty($where) ? '' : ' AND ';
        $where .= 'deletedAt IS NULL';

        return parent::fetch( $limit, $offset, $where, $queryParams );
    }

    /**
     * @param bool $setTimestamps
     *
     * @return bool
     */
    public function save ( $setTimestamps = true ) {

        $this->pre_save( $setTimestamps );

        return parent::save();
    }

    /**
     * @param bool $setTimestamps
     */
    public function pre_save ( $setTimestamps = true ) {

        if( $setTimestamps ) {

            // set timestamps
            if( empty($this->createdAt) ) {
                $this->set_literal( 'createdAt', 'NOW()' );
            }
            $this->set_literal( 'updatedAt', 'NOW()' );

        }

        $this->valueMd5 = md5( $this->value );
    }

}

?>
