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

    public $entries = [];
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
}

?>