<?php

namespace Console\Importer;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use LRUCache\LRUCache;

/**
 * Class ImporterAbstract
 * @package Console\Importer
 */
abstract class ImporterAbstract {

    /**
     * @param $filePath
     *
     * @return mixed
     */
    abstract public function import ( $filePath );
}
