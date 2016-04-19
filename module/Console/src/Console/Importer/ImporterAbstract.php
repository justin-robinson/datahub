<?php

namespace Console\Importer;

/**
 * Class ImporterAbstract
 * @package Console\Importer
 */
abstract class ImporterAbstract {

    /**
     * @param $filePath
     * @param $db \PDO
     *
     * @return mixed
     */
    abstract public function import ( $filePath, $db );
}
