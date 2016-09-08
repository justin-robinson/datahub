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
        $header   = $file->getHeaderRow();
        $firstRow = explode(',', $file->fgets());
    
        // skip to the next line of the file
        $file->setHasHeaderRow(true);
    
        foreach ($file as $line){
            $bbm = new DatahubBbm();
            $bbm->populate($line);
            $bbm->save();
        }
       
        
        return true;
    }
}