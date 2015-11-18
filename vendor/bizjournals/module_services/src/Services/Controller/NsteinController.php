<?php

namespace Services\Controller;

use CMS\Controller\AbstractActionController;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

class NsteinController extends AbstractActionController
{
    public function indexAction()
    {
        /* @var $nstein \Services\Nstein\Client */
        $nstein = $this->getServiceLocator()->get('Services\Nstein\Client');
        $response = $nstein->ping();
        
        var_dump(Json::fromXml($response));
        
        exit;
    }
    
    public function searchAction()
    {
        $html = <<<EOF
Small business growth is being hurt by delays by the Securities and Exchange Commission in setting ruled to allow crowdfunding.
That is a recurring theme at a U.S. House Small Business Committee hearing in Washington on the SEC's handling of provisions in last year's Jumpstart Our Business Startups Act.
The law calls for rank and file investors to get equity in new businesses that they back through various crowdfunding vehicles that have been set up in anticipation of the new rules taking effect. Equity investments in startups until now has been restricted to wealthy investors who meet minimum income and net worth standards.
But the SEC has taken more than a year to set crowdfunding rules and it isn't clear when they will be ready. While much of the focus of equity crowdfunding has been on tech startups that get most of that sort of backing today, advocates say there is a much larger group of small businesses in places outside of tech hotbeds that stand to benefit.
"The longer we wait for action by the regulators, the more our engines of economic growth will continue to simply tread water," said U.S. Rep. David Schweikert, a Republican from Arizona, in a prepared statement. "Or worst yet, starve for lack of opportunity."
The SEC said in a prepared statement of its own, "The commission and staff are moving forward on the various rulemakings. We look forward to completing the remaining provisions as soon as practicable."
Bloomberg reported that Georgetown University finance Prof. James J. Angel urged the SEC to adopt interim rules and monitor how they affect capital formation and investor protection: "The commission has shown a pattern of antipathy toward the idea of crowdfunding from the beginning and is in great danger of killing the idea through regulatory delay and over- regulation."
EOF;

        $html = iconv('UTF-8', 'ASCII//TRANSLIT', $html);
    
        $html = str_replace('</p><p>', "\n", $html);
        $html = strip_tags($html);
        $html = htmlentities($html);
        
        $nstein = $this->getServiceLocator()->get('Services\Nstein\Client');
        $response = $nstein->search($html);
        
        $refinery = $this->getServiceLocator()->get('Services\Refinery\Search');
        foreach ($response['Companies'] as &$company) {
            $matches = $refinery->byCompany($company['id']);
            foreach ($matches as $match) {
                if ($match['status'] == 'ACTIVE' && !empty($match['ticker'])) {
                    $company['verify'] = $match['id'];
                    break;
                }
            }
        }
        
        var_dump($response);
        
        exit;
    
        return new JsonModel(array('content' => $response));
    }
}
