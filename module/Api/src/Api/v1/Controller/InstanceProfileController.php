<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\InstanceFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyProfileController
 * @package Api\v1\Controller
 */
class InstanceProfileController extends AbstractRestfulController
{

    /**
     * @param mixed $companyInstanceId
     *
*@return JsonModel
     */
    public function get($companyInstanceId)
    {

        /**
         * @var $companyInstance CompanyInstance
         */
        $companyInstance = CompanyInstance::fetch_by_id($companyInstanceId);

        if ($companyInstance === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        $companyInstance->fetch_channel_ids();
        $companyInstance->fetch_properties();
        $companyInstance->fetch_contacts();
        $companyInstance->fetch_state();
        $companyInstance->fetch_lists();

        return new JsonModel(InstanceFormatter::format($companyInstance));
    }


}
