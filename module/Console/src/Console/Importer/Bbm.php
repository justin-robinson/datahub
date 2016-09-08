<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/8/16
 * Time: 11:13 AM
 */

namespace Console\Importer;

use Console\CsvIterator;
use DB\Datahub\DatahubBbm;



class Bbm
{
      /**
     * @param      $csvFile
     *
     * @return array
     */
    public function importFromCsv($csvFile)
    {

        // open file as csv
        $file = new  CsvIterator($csvFile);
        // create the dataset and save it
        $header               = $file->getHeaderRow();
        $firstRow             = explode(',', $file->fgets());
        $DataSet              = new Set();
        $DataSet->ranked_by   = end($header);
        $DataSet->market_code = $firstRow[2];
        $DataSet->name        = $firstRow[1];

        // skip to the next line of the file
        $file->setHasHeaderRow(true);

        // process the rows
        if ($DataSet->save()) {
            $DataSet->id;
            foreach ($file as $record) {
//                create entries and save them
                try {
                    $entry                    = new Entries();
                    $entry->companyInstanceId = $record[0];
                    $entry->ranked            = $record[3];
                    $entry->dataset_id        = $DataSet->id;
                    $entry->meta              = $DataSet->ranked_by;
                    $entry->save();

                } catch (\Console\CsvIteratorException $e) {
                    // CsvIterator throws an exception when number of columns in the header row
                    // and the current line do not match
                    echo $e->getMessage() . PHP_EOL;

                    return false;
                }

            }
            $return = true;
        } else {
            $return = false;
        }

        return $return;
    }
}