<?php

namespace DB\Datahub;

use LRUCache\LRUCache;
use Scoop\Database\Literal;
use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;
/**
 * Class Dataset
 *
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/07/05
 * @inheritdoc
 *          This file is only generated once
 *          Put your class specific code in here
 */
/**
 * Class Dataset
 *
 * @package DB\Datahub
 */
class Dataset extends \DBCore\Datahub\Dataset
{

    /**
     * @var Rows
     */
    public $entries;

    /**
     * @var LRUCache
     */
    public static $dataSetCache;

    /**
     * Dataset constructor.
     *
     * @param array $dataArray
     */
    public function __construct(array $dataArray = [])
    {
        if ( is_null(self::$dataSetCache) ) {
            self::$dataSetCache = new LRUCache( 1000 );
        }

        $this->entries = new Rows();

        parent::__construct($dataArray);
    }


    /**
     * @return mixed
     */
    public function fetchDatasetEntries()
    {

        if (!empty($this->id)) {
            $entries       = DatasetEntries::fetch_where('dataset_id = ?', [$this->id], 1000, 0, true);
            $this->entries = $entries ? $entries : new Rows();
        }

        return $this->entries;
    }

    public function save()
    {
        if(parent::save()){
            if($this->saveDataSetEntries()){
                return $this;
            }
        }
        return false;
    }

    private function saveDataSetEntries(){
        $return = false;
//        if ( empty($this->id) ) {
//            return $return;
//        }
        // save each entry
        foreach ($this->entries as $entry) {
            // create entry objects
            $new = new DatasetEntries($entry);
            // link this instance to the company
            $new->dataset_id = $this->id;
            if($new->save()){
                $return = true;
            } else {
                break;
            }
        }
        return $return;
    }
    
    /**
     * @param array $dataArray
     */
    public function populate ( array $dataArray ) {

        foreach ( $dataArray as $name => $value ) {
            $this->__set( $name, $value );
        }
    }
    
    
}

?>