#!/usr/env php
<?php

$_SERVER['APPLICATION_ENV'] = 'development';

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Syncs dev companies, instances, properties data while maintaining ids
 * Production data is authortative on company and instance ids, dev is authortive on all other data
 * Property Ids will be regenerated
 * companies and instances are matched and synced, while properties are completely overwritten
 * You need to have a database datahub_prod in the dev db and generate the db models
 * This will NOT modify the datahub schema. It will make all changes in datahub_prod. You need to export those results when this finishes
 *
 * Env setup:
 * 1. Clone production into dev as datahub_prod
 * 2. Copy datahub_prod.companyInstanceProperty to datahub_prod.companyInstanceProperty_copy
 * 3. Truncate datahub_prod.companyInstanceProperty
 * 4. Generate the scoop models for datahub_prod ( #> ./datahub/vender/bin/scoop --action generate_db_models --schema datahub_prod --env development )
 *
 * Class Importer
 */
class Importer {

    public $companiesMatched;
    public $companiesInserted;
    public $instancesMatched;
    public $instancesInserted;

    /** @var \Scoop\Database\Query\Buffer */
    public $propertyInsertionBuffer;

    public function import(){

        $limit = 1000;      // how many companies we will process at a time
        $companyOffset = 0; // start at the first company
        $this->companiesMatched // just some stats
            = $this->companiesInserted
            = $this->instancesMatched
            = $this->instancesInserted
            = 0;

        // buffer property insertions 1000 at time
        $this->propertyInsertionBuffer = new \Scoop\Database\Query\Buffer(1000, \DB\DatahubProd\CompanyInstanceProperty::class);
        $this->propertyInsertionBuffer->set_insert_ignore(true); // sql flag to ignore errors from duplicate keys

        // loop through every company on dev 1000 at a time
        while ( $companies = \DB\Datahub\Company::fetch($limit, $companyOffset) ) {

            /** @var $company \DB\Datahub\Company */
            // match these 1000 companies
            foreach ( $companies as $company ) {

                // the dev company minus the id
                $companyData = $company->to_array();
                unset($companyData['companyId']);

                // lookup the company in the prod db
                $prodCompany = \DB\DatahubProd\Company::fetch_one_where('normalizedName = ?', [$company->normalizedName]);

                // populate the existing company from production with our dev values or create a new company in production
                if ( $prodCompany instanceof \DB\DatahubProd\Company ) {
                    $prodCompany->populate($companyData);
                    ++$this->companiesMatched;
                } else {
                    $prodCompany = new \DB\DatahubProd\Company($companyData);
                    ++$this->companiesInserted;
                }

                // save production company
                $prodCompany->save();

                // process all the instances for this company
                $this->import_instances($company, $prodCompany);
            }

            // get next 1000 companies
            $companyOffset += $limit;
        }

        // save all properties left in buffer
        $this->propertyInsertionBuffer->flush();
    }

    private function import_instances ( \DB\Datahub\Company $company, \DB\DatahubProd\Company $prodCompany ) {

        /** @var $instance \DB\Datahub\CompanyInstance */
        foreach ( $company->fetch_company_instances() as $instance ) {

            // the dev instance
            $instanceData = $instance->to_array();
            unset($instanceData['companyInstanceId']); // minus the id
            $instanceData['companyId'] = $prodCompany->companyId; // linked to the production companies ID

            // get all the properties since we use that for uniqueness
            $instance->fetch_properties();

            // need zip code and address1
            $zip = $instance->get_property('zipCode');
            $zip = $zip ? $zip->value : '';
            $addr1 = $instance->get_property('address1');
            $addr1 = $addr1 ? $addr1->value : '';

            // instances are identified by their id, name, zip, and address1
            $queryParams = [
                $prodCompany->companyId,
                $instance->name,
                $zip,
                $addr1,
            ];

            // look for an production instance matching the dev one
            $prodInstance = \DB\DatahubProd\CompanyInstance::query("SELECT
                      i.*
                     FROM
                      `datahub_prod`.`companyInstance` i
                      LEFT JOIN `datahub_prod`.`companyInstanceProperty_copy` p USING ( companyInstanceId )
                     WHERE
                      i.companyId = ?
                      AND i.name = ?
                      AND p.deletedAt IS NULL
                      AND i.deletedAt IS NULL
                      AND (
                        ( p.name = 'zipCode' AND p.value = ? )
                        OR
                        ( p.name = 'address1' AND p.value = ? )
                      )
                      GROUP BY
                        i.companyInstanceId", $queryParams);

            // populate the existing instance from production with our dev values or create a new instance in production
            if ( $prodInstance ) {
                $prodInstance = $prodInstance->first();
                $prodInstance->populate($instanceData);
                ++$this->instancesMatched;
            } else {
                $prodInstance = new \DB\DatahubProd\CompanyInstance($instanceData);
                ++$this->instancesInserted;
            }

            // save the production instance
            $prodInstance->save();

            // process all the properties
            $this->import_properties($instance, $prodInstance);
        }

    }

    private function import_properties(\DB\Datahub\CompanyInstance $instance, \DB\DatahubProd\CompanyInstance $prodInstance) {

        /** @var $property \DB\DatahubProd\CompanyInstanceProperty*/
        foreach ( $instance->get_properties() as $property ) {

            $propertyData = $property->to_array();
            unset($propertyData['companyInstancePropertyId']);
            $propertyData['companyInstanceId'] = $prodInstance->companyInstanceId;

            $prodProperty = new \DB\DatahubProd\CompanyInstanceProperty($propertyData);

            $this->propertyInsertionBuffer->insert($prodProperty);
        }
    }

}


$startTime = new DateTime();
echo "Started " . $startTime->format('Y-m-d H:i:s') . PHP_EOL;

$importer = new Importer();
$importer->import();

$endTime = new DateTime();
$runTime = $endTime->diff($startTime);
echo "Matched {$importer->companiesMatched} companies " . PHP_EOL . "Created {$importer->companiesInserted} companies" . PHP_EOL;
echo "Matched {$importer->instancesMatched} instances " . PHP_EOL . "Created {$importer->instancesInserted} instances" . PHP_EOL;
echo "Finished " . $endTime->format('Y-m-d H:i:s') . PHP_EOL;
echo $runTime->format('Runtime: %H:%I:%S');
