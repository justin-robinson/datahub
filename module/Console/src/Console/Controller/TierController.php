<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/23/16
 * Time: 11:05 AM
 */

namespace Console\Controller;

use Console\DB\Connection\DB;
use DBCore\Datahub\CompanyInstance;
use Hub\Model\Company;


class TierController extends AbstractActionController
{
    public function reportAction() {
        /**
         * generates 7 files, 1 for each tier
         * files contain
         * instance_name, instance_id, entity_id (company id)
         *
         *
         *
         *
         *
         */

        $basicFields = [
            'address1',
            //    'address2',
            'city',
            'country',
            'latitude',
            'longitude',
            'zipCode',
            'state',
        ];

        $tier_1 = fopen('/home/vagrant/files/tier_1.csv', 'w');
        $tier_2 = fopen('/home/vagrant/files/tier_2.csv', 'w');
        $tier_3 = fopen('/home/vagrant/files/tier_3.csv', 'w');
        $tier_4 = fopen('/home/vagrant/files/tier_4.csv', 'w');
        $tier_5 = fopen('/home/vagrant/files/tier_5.csv', 'w');
        $tier_6 = fopen('/home/vagrant/files/tier_6.csv', 'w');
        $tier_7 = fopen('/home/vagrant/files/tier_7.csv', 'w');

        $paginate = 500;
        $db = DB::createPdo([
            'host'=> 'devdb.bizj-internal.com',
            'dbname'=>'datahub',
            'user'=>'web',
            'password'=>''
        ]);

        // potential tier one companies have properties that are less than 1 year old
        $tier1sql = "
            SELECT DISTINCT c.name, c.companyId
            FROM companyInstanceProperty cip
              JOIN companyInstance using(companyInstanceId)
              JOIN company c USING (companyId)
            WHERE cip.updatedAt >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ";
        $stmnt = $db->prepare($tier1sql);

        $stmnt->execute();
        $results = $stmnt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $company = new \DB\Datahub\Company();
            $companyData = $company::fetch_company_and_instances($result['companyId']);
            foreach ($companyData->get_company_instances() as $instance) {
                if($company->tierOneValidate($instance)){
                    echo 'tier1 company';
                }
                elseif($company->tierTwoValidate($instance)){
                    echo 'tier2 company';
                }
            }

        }

        // justin loves this sort of code
        // store off the unique instance names


    }
}