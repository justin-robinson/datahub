<?php

namespace Services\Nstein;

use Services\AbstractClient;
use Services\Nstein\RuntimeException;
use Services\Nstein\TimeoutException;
use Services\Nstein\ConnectionException;
use Services\Nstein\ParseException;
use Zend\Stdlib\ErrorHandler;

class Client extends AbstractClient
{
    const TIMEOUT        = 10;
    const MINIMUM_WEIGHT = 50;
    const PORT_XMLRPC    = 40000;
    const PORT_REST      = 40002;

    /**
     * The raw XML response from nstein
     * @var string
     */
    protected $raw_response;

    /**
     * The raw XML request sent to nstein
     * @var string
     */
    protected $raw_request;

    /**
     * The request version. 1 for TME 4.x XML/RPC, 2 for OTCA 5.2 XML/RPC, 3 for OTCA 5.2 REST
     * @var integer
     */
    protected $request_version = 1;

    /**
     * Cartridges available:
     *     ON (org names)
     *     PN (person names)
     *     GL (locations)
     *     DT (dates & times)
     *     TM (trademarks)
     *     CU (currencies)
     *     EV (events)
     *     LS (life sciences)
     */
    protected $categories = array(
        'ON' => array(
            'name' => 'Companies',
            'enabled' => true,
            'min-weight' => 50,
            'min-confidence' => 50,
            'use-normalized' => false,
        ),
        'PN' => array(
            'name' => 'People',
            'enabled' => true,
            'min-weight' => 50,
            'min-confidence' => 50,
            'use-normalized' => true,
        ),
        'GL' => array(
            'name' => 'Locations',
            'enabled' => true,
            'min-weight' => 50,
            'min-confidence' => 50,
            'use-normalized' => true,
        ),
    );

    /**
     * Exclude list
     *
     * @var array
     */
    protected $exclude_list = array(
        'ON' => array('NYSE'),
        'PN' => array(),
        'GL' => array(),
    );

    /**
     * Industry map
     * @var array
     */
    protected $industry_map;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct($options = array())
    {
        parent::__construct($options);

        if (isset($options['request_version'])) {
            $this->setRequestVersion($options['request_version']);
        }

        if (isset($options['host'])) {
            $this->host = $options['host'];
        }

        if (isset($options['industry_map'])) {
            $this->industry_map = $options['industry_map'];
        }
    }

    /**
     * Get raw xml response
     * @return string
     */
    public function getRawResponse()
    {
        return $this->raw_response;
    }

    /**
     * Get raw xml request
     * @return string
     */
    public function getRawRequest()
    {
        return $this->raw_request;
    }

    /**
     * Allow overriding host for debug/test
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * Return current defined nstein host
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * noop - replaced by constant
     */
    public function setPort($port)
    {
    }

    /**
     * Return current defined nstein port
     * @return string
     */
    public function getPort()
    {
        if ($this->request_version == 1) {
            return self::PORT_XMLRPC;
        } else {
            return self::PORT_REST;
        }
    }

    /**
     * Allow overriding host for debug/test
     * @param string $host
     */
    public function setRequestVersion($version)
    {
        $this->request_version = $version;
    }

    /**
     * Return current defined nstein request version
     * @return string
     */
    public function getRequestVersion()
    {
        return $this->request_version;
    }

    public function ping()
    {
        $xml = <<<EOD
    <?xml version="1.0" encoding="utf-8"?>
    <Nserver>
        <ResultEncoding>UTF-8</ResultEncoding>
        <LanguageID>ENGLISH</LanguageID>
        <Methods>
            <Ping />
        </Methods>
    </Nserver>
EOD;
        return $this->send($xml);
    }

    /**
      * Nstein search
      * @param string content
      * @param string content id optional for reporting error
      */
    public function search($text, $content_id = 'unknown')
    {
        $text_id = time();
        $text = trim(preg_replace('|\s+|', ' ', preg_replace('|&nbsp;|', ' ', $text)));
        try {
            $text = @iconv('UTF-8', 'UTF-8//IGNORE', $text);
        } catch (\Exception $e) {
        }
        // remove control chars except \r and \n
        $text = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $text);
        $text = str_replace(array('<', '>'), array('&lt;', '&gt;'),
            str_replace('&amp;amp;', '&amp;', str_replace('&', '&amp;',
                str_replace(chr(194) . chr(160), ' ', $text))));
        if ($this->request_version == 1) {
            $xml = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<Nserver>
    <ResultEncoding>UTF-8</ResultEncoding>
    <TextID>$text_id</TextID>
    <NSTEIN_Text>$text</NSTEIN_Text>
    <LanguageID>ENGLISH</LanguageID>
    <Methods>
        <ncategorizer>
            <KBid>BizJournals_CS</KBid>
        </ncategorizer>
        <nfinder>
            <nfExtract>
                <Hierarchy/>
                <Cartridges>
                    <Cartridge>ON</Cartridge>
                    <Cartridge>PN</Cartridge>
                    <Cartridge>GL</Cartridge>
                </Cartridges>
            </nfExtract>
        </nfinder>
        <nconceptextractor>
            <ResultLayout>NCONCEPTEXTRACTOR</ResultLayout>
            <ComplexConcepts>
                <NumberOfComplexConcepts>25</NumberOfComplexConcepts>
            </ComplexConcepts>
            <SimpleConcepts>
                <NumberOfSimpleConcepts>25</NumberOfSimpleConcepts>
            </SimpleConcepts>
        </nconceptextractor>
    </Methods>
</Nserver>
EOD;
        } else {
            // request ver 2+
            $requestId = $id . '_' . time();
            $xml = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<Nserver>
    <ID>$requestId</ID>
    <TextID>$text_id</TextID>
    <NSTEIN_Text>$text</NSTEIN_Text>
    <LanguageID>en</LanguageID>
    <Methods>
        <ncategorizer>
            <KBid>BizJournals_CS</KBid>
        </ncategorizer>
        <nfinder>
            <nfExtract>
                <Cartridges>
                    <Cartridge>ON</Cartridge>
                    <Cartridge>PN</Cartridge>
                    <Cartridge>GL</Cartridge>
                </Cartridges>
                <OutputSubterms>true</OutputSubterms>
                <OutputAttributes>false</OutputAttributes>
                <OutputHomonymsAttributes>false</OutputHomonymsAttributes>
            </nfExtract>
        </nfinder>
        <nconceptextractor>
            <ResultLayout>NCONCEPTEXTRACTOR</ResultLayout>
            <ComplexConcepts>
                <NumberOfComplexConcepts>25</NumberOfComplexConcepts>
            </ComplexConcepts>
            <SimpleConcepts>
                <NumberOfSimpleConcepts>25</NumberOfSimpleConcepts>
            </SimpleConcepts>
        </nconceptextractor>
    </Methods>
</Nserver>
EOD;
        }

        $this->raw_request = $xml;
        if ($this->request_version < 3) {
            $response = $this->send($xml);
        } else {
            $response = $this->sendrest($xml);
        }
        $this->raw_response = $response;

        if (false === ($Nserver = simplexml_load_string($response))) {
            throw new ParseException(sprintf('Could not parse XML response from NStein on content id (%s) for request (%s) with response (%s)', $content_id, $xml, $response));
        }

        if ($Nserver->ErrorDescription != 'Success') {
            throw new RuntimeException(sprintf('Nstein returned error (%s) on content id (%s) for request (%s)', $Nserver->ErrorDescription, $content_id, $xml));
        }

        $industry_model = $this->getServiceLocator()->get('Entity\Model\Industry');
        $allIndustries  = $industry_model->getAllCurrentIndustries();

        $topic_model    = $this->getServiceLocator()->get('Entity\Model\Topic');

        // extract entities
        $entities = array();
        foreach ($Nserver->Results->nfinder->nfExtract->ExtractedTerm as $term) {
            if ($this->request_version == 1) {
                $weight     = (string)$term['Weight'];
                $confidence = (string)$term['ConfidenceScore'];
                $category   = (string)$term['CartridgeID'];
            } else {
                $weight     = (string)$term->attributes()->RelevancyScore;
                $confidence = (string)$term->attributes()->ConfidenceScore;
                $category   = (string)$term->attributes()->CartridgeID;
            }
            if ($this->categories[$category]['enabled']) {
                $id = (string)$term->nfinderNormalized;
                if (empty($id)) {
                    $id = (string)$term->Subterms->Subterm;
                }

                if (($this->categories[$category]['use-normalized'])) {
                    $text = $id;
                } else {
                    $text = (string)$term->Subterms->Subterm;
                }

                // skip the rest of this for each to avoid adding single word person names to the $entities array
                if ($category === 'PN') {
                    if (substr_count($text, ' ') == 0) {
                        continue;
                    }
                }

                if ($confidence < $this->categories[$category]['min-confidence'] ||
                    $weight < $this->categories[$category]['min-weight'] ||
                    in_array($id, $this->exclude_list[$category])) {
                    continue;
                }

                $category_name = $this->categories[$category]['name'];
                if (!isset($entities[$category_name])) {
                    $entities[$category_name] = array();
                }

                $entities[$category_name][] = array(
                    'id'         => $id,
                    'text'       => $text,
                    'weight'     => $weight,
                    'confidence' => $confidence,
                    'hash'       => substr(md5(strtolower($category_name) . $id), 0, 4),
                );
            }
        }

        // extract categories
        $industries = $topics = array();
        foreach ($Nserver->Results->ncategorizer->Categories->Category as $category) {
            $name = (string)$category;
            if ($this->request_version == 1) {
                $weight = (string)$category['Weight'];
            } else {
                $weight = (string)$category->attributes()->Weight;
            }
            if ($name != 'NO CATEGORIES') {
                list ($main_name, $sub_name) = explode(': ', $name);
                $industry_id = null;
                if ($this->request_version == 1) {
                    if (isset($this->industry_map['full'][$name])) {
                        $industry_id = $this->industry_map['full'][$name];
                    } else {
                        if (isset($this->industry_map['partial'][$main_name])) {
                            $industry_id = $this->industry_map['partial'][$main_name];
                        }
                    }
                    if ($industry_id && !isset($industries[$industry_id])) {
                        $industry = $industry_model->find($industry_id);
                        $entities['Industries'][] = array(
                            'id'     => $industry_id,
                            'text'   => $industry['industry_name'],
                            'weight' => $weight,
                            'hash'   => substr(md5('industries' . $industry_id), 0, 4),
                        );
                        $industries[$industry_id] = true;
                    }
                } else {
                    foreach ($allIndustries as $allIndustry) {
                        if ($allIndustry->getIndustryName() == $main_name) {
                            $industry_id = $allIndustry->getIndustryId();
                            if ($industry_id && !isset($industries[$industry_id])) {
                                $entities['Industries'][] = array(
                                    'id'     => $industry_id,
                                    'text'   => $allIndustry->getIndustryName(),
                                    'weight' => $weight,
                                    'hash'   => substr(md5('industries' . $industry_id), 0, 4),
                                );
                                $industries[$industry_id] = true;
                            }
                        }
                    }
                }

                // try and match $sub_name with topic
                $code = preg_replace(array('/[^(?:\w|\s)]/', '/\s+/'), array('', '-'), strtolower($sub_name));
                if (!isset($topics[$code])) {
                    $topic = $topic_model->findOneBy(array('usage_market' => 'global', 'topic_code' => $code));
                    if ($topic) {
                        $entities['Tags'][] = array(
                            'id'     => $topic['topic_code'],
                            'text'   => $topic['topic_name'],
                            'weight' => $weight,
                            'hash'   => substr(md5('tags' . $topic['topic_code']), 0, 4),
                        );
                        $topics[$code] = true;
                    }
                }
            }
        }

        $extractor = $Nserver->Results->nconceptextractor;
        // extract concepts
        foreach (array($extractor->ComplexConcepts->Concept, $extractor->SimpleConcepts->Concept) as $concepts) {
            foreach ($concepts as $concept) {
                $weight = (string) $concept['Relevancy'];
                $code = preg_replace(array('/[^(?:\w|\s)]/', '/\s+/'), array('', '-'), strtolower((string) $concept));
                if (!isset($topics[$code])) {
                    // try and match $sub_name with topic
                    $topic = $topic_model->findOneBy(array('usage_market' => 'global', 'topic_code' => $code));
                    if ($topic) {
                        $entities['Tags'][] = array(
                            'id'     => $topic['topic_code'],
                            'text'   => $topic['topic_name'],
                            'weight' => $weight,
                            'hash'   => substr(md5('tags' . $topic['topic_code']), 0, 4),
                        );
                        $topics[$code] = true;
                    }
                }
            }
        }

        return $entities;

    }

    /**
     * Send actual request to nstein
     * @param string $xml
     * @throws ConnectionException
     * @return string
     */
    private function send($xml = null)
    {
        $response = '';
        $this->socket = stream_socket_client($this->host . ':' . $this->getPort(), $errno, $errstr, self::TIMEOUT);

        if ($this->socket) {
            $bytes = pack('V', strlen($xml));
            fwrite($this->socket, $bytes . $xml);
            $resplen = unpack('V', fread($this->socket, 4));

            do {
                $buff = fread($this->socket, 8192);
                if ($buff === false || strlen($buff) === 0) {
                    $this->checkSocketReadTimeout();
                    break;
                } else {
                    $response .= $buff;
                }
            } while (feof($this->socket) === false && strlen($response) < $resplen[1]);

            fclose($this->socket);

            if (!$response) {
                throw new ConnectionException("Unable to read response, or response is empty ($errno - $errstr) for request (" . htmlspecialchars($xml) . ")");
            }

            return $response;
        } else {
            throw new ConnectionException("Could not create connection to socket " . $this->host . ':' . $this->getPort());
        }
    }

    /**
     * Send actual request to nstein
     * @param string $xml
     * @param string rest path
     * @throws ConnectionException
     * @return string
     */
    private function sendrest($xml = null, $restPath = '/rs/')
    {
        $response = '';

        $requestUrl = 'http://' . $this->host . ':' . $this->getPort() . $restPath;
        $ch = curl_init($requestUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/xml; charset=utf-8',
            'Content-Type: application/xml',
            'Content-Length: ' . strlen($xml)));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        $response = curl_exec($ch);

        if (!$response) {
            throw new ConnectionException("Unable to read response, or response is empty for request (" . htmlspecialchars($xml) . ") for "  . $this->host . ':' . $this->getPort());
        }
        if (curl_errno($ch)) {
            throw new ConnectionException("Request error " . curl_error($ch) . " for request ($xml) for " . $this->host . ':' . $this->getPort());
        }

        curl_close($ch);

        return $response;
    }

    /**
     * Check if the socket has timed out - if so close connection and throw
     * an exception
     *
     * @throws AdapterException\TimeoutException with READ_TIMEOUT code
     */
    protected function checkSocketReadTimeout()
    {
        if ($this->socket) {
            $info = stream_get_meta_data($this->socket);
            $timedout = $info['timed_out'];
            if ($timedout) {
                $this->close();
                throw new TimeoutException('Read timed out after ' . self::TIMEOUT . ' seconds');
            }
        }
    }

    /**
     * Close the connection to the server
     *
     */
    public function close()
    {
        if (is_resource($this->socket)) {
            ErrorHandler::start();
            fclose($this->socket);
            ErrorHandler::stop();
        }
        $this->socket = null;
    }
}
