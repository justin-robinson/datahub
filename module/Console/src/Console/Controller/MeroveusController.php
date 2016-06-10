<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Console\CsvIterator;
use Console\Importer\Refinery;
use Console\Record\Formatter\Factory;
use Console\Record\Formatter\Formatters\Meroveus;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;
use Elastica\Client as ElasticaClient;
use Elastica\Query as ElasticaQuery;
use Elastica\QueryBuilder as QueryBuilder;
use Elastica\Search as ElasticaSearch;
use Monolog\Handler\PHPConsoleHandler;
use Scoop\Database\Literal;
use Services\Meroveus\Client as MeroveusClient;
use Services\Meroveus\CompanyService;
use Zend\Mvc\MvcEvent;

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 *
 * @package Console\Controller
 *          pdo statement prep happens in __construct for DI reasons
 */
class MeroveusController extends AbstractActionController
{
    /**
     * @var array $markets
     * map of our market names to their respective meroveus environments
     */
    private $markets = [
        'albany'       => '12',
        'albuquerque'  => '9',
        'atlanta'      => '11',
        'austin'       => '22',
        'baltimore'    => '15',
        'birmingham'   => '30',
        'boston'       => '34',
        'buffalo'      => '3',
        'charlotte'    => '26',
        'cincinnati'   => '6',
        'columbus'     => '31',
        'dallas'       => '7',
        'dayton'       => '19',
        'denver'       => '2',
        'houston'      => '8',
        'jacksonville' => '23',
        'kansascity'   => '13',
        'louisville'   => '32',
        'memphis'      => '10',
        'milwaukee'    => '33',
        'nashville'    => '20',
        'orlando'      => '17',
        'pacific'      => '38',
        'philadelphia' => '16',
        'phoenix'      => '14',
        'pittsburgh'   => '18',
        'portland'     => '24',
        'sacramento'   => '4',
        'sanantonio'   => '25',
        'sanfrancisco' => '39',
        'sanjose'      => '40',
        'seattle'      => '41',
        'southflorida' => '35',
        'stlouis'      => '28',
        'tampabay'     => '36',
        'triad'        => '29',
        'triangle'     => '27',
        'twincities'   => '21',
        'washington'   => '5',
        'wichita'      => '37',
    ];

    /**
     * @var MeroveusClient
     */
    private $meroveusClient;

    /**
     * @var ElasticaClient
     */
    private $elasticaClient;

    /**
     * @var CompanyService
     */
    private $companyService;

    /** @var  $contactService \Services\Meroveus\ContactService */
    private $contactService;

    /**
     * @var ElasticaSearch
     */
    private $elasticSearch;

    /**
     * @var ElasticaQuery
     */
    private $elasticQuery;

    /**
     * @var QueryBuilder
     */
    private $elasticQueryBuilder;

    /**
     * @var array
     */
    private $jobIdDictionary = [];

    /**
     * @var $sqlStringsArray string[]
     */
    protected $sqlStringsArray = [
        'selectOneCompanyByMeroveusId'     => '
            SELECT
              *
            FROM
              `datahub`.`company`
            WHERE
              meroveus_id = ?',
        'selectCompaniesWithoutMeroveusId' => '
            SELECT
              *
            FROM
              `datahub`.`company`
            WHERE
              meroveus_id IS NULL
            LIMIT :offset, :limit',
        'insertMeroveusIndustry'           => '
            INSERT INTO
              `datahub`.`meroveus_industry` (external_id, industry)
            VALUES (:external_id, :industry)',
        'insertCompanyMeroveusIndustry'    => '
            INSERT INTO
              `datahub`.`company_meroveus_industry_map`
            (hub_id, meroveus_industry_id)
            VALUES
            (:hub_id, :meroveus_industry_id)',
    ];


    /**
     * set up services and data
     *
     * @param MvcEvent $e
     */
    public function init(MvcEvent $e)
    {
        parent::init($e);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->companyService = new CompanyService($this->meroveusClient);
        //@todo make this environment aware
        // set up elastic
        $this->elasticaClient      = new ElasticaClient($this->getServiceLocator()->get('Config')['elastica-datahub']);
        $this->elasticSearch       = new ElasticaSearch($this->elasticaClient);
        $this->elasticQuery        = new ElasticaQuery();
        $this->elasticQueryBuilder = new QueryBuilder();
        $this->contactService      = $this->getServiceLocator()->get('Services\Meroveus\ContactService');
        // prepare pdo outside the loop for memory purposes

    }


    /**
     * utility randomness
     *
     * @return string
     */
    public function indexAction()
    {
        $numbers      = 1000;
        $randomIds    = [
            182652,
            78702,
            310030,
            281602,
            90388,
            303766,
            309031,
            291940,
            295803,
            296152,
            1596,
            305185,
            110227,
            30930,
            184057,
            235593,
            82165,
            141388,
            132096,
            296750,
            306227,
            286447,
            289960,
            301246,
            273111,
            303528,
            284384,
            294424,
            292334,
            208763,
            62065,
            222104,
            36214,
            207065,
            146245,
            291339,
            296382,
            175748,
            295208,
            207582,
            272550,
            309233,
            133969,
            303737,
            81936,
            279335,
            288100,
            108826,
            88954,
            48063,
            290845,
            271474,
            308750,
            293286,
            245373,
            201088,
            170816,
            274142,
            130028,
            308505,
            53440,
            286324,
            206925,
            298574,
            124642,
            200919,
            303586,
            297111,
            283100,
            308579,
            208499,
            24326,
            199727,
            240778,
            292779,
            104052,
            105881,
            33273,
            195390,
            295722,
            293858,
            301003,
            18652,
            285405,
            284848,
            309638,
            280775,
            309048,
            294360,
            291351,
            281970,
            296007,
            44645,
            276521,
            102005,
            284469,
            186684,
            289273,
            40821,
            307939,
            307698,
            246124,
            280531,
            39434,
            287501,
            113062,
            299894,
            80322,
            304304,
            166240,
            23146,
            286314,
            302498,
            154242,
            306115,
            119881,
            103557,
            281445,
            55508,
            298071,
            297761,
            304570,
            290886,
            285832,
            2102,
            293250,
            309593,
            144456,
            280806,
            283674,
            181564,
            282951,
            96733,
            96175,
            288247,
            19928,
            202007,
            300854,
            286340,
            296931,
            194296,
            243459,
            309463,
            53492,
            301463,
            298440,
            310046,
            283788,
            293714,
            301361,
            26217,
            193249,
            134441,
            81658,
            294693,
            81064,
            89952,
            300947,
            302675,
            157435,
            289400,
            175870,
            262693,
            218200,
            195594,
            177450,
            265940,
            283369,
            298228,
            33799,
            198919,
            184058,
            53418,
            292301,
            177404,
            227166,
            304414,
            41262,
            302936,
            10293,
            305807,
            1626,
            21296,
            235383,
            296739,
            283378,
            297311,
            290250,
            33394,
            305691,
            215621,
            193608,
            245667,
            193324,
            230252,
            285974,
            306190,
            39239,
            195737,
            306698,
            295647,
            196348,
            167432,
            96645,
            292534,
            299463,
            307046,
            300894,
            123346,
            182047,
            35330,
            280911,
            288853,
            19680,
            309100,
            281184,
            72081,
            42369,
            100432,
            262263,
            279008,
            115419,
            101680,
            283232,
            299380,
            40806,
            34404,
            145664,
            211834,
            260640,
            296385,
            29393,
            120968,
            285278,
            232682,
            290500,
            300571,
            49418,
            303616,
            287718,
            308574,
            291311,
            267251,
            120449,
            96543,
            45761,
            293410,
            288939,
            235938,
            282875,
            217704,
            138005,
            304460,
            305529,
            284664,
            282955,
            205854,
            90096,
            297390,
            119121,
            296881,
            304504,
            302443,
            285369,
            285948,
            302275,
            120364,
            308119,
            137554,
            293935,
            305962,
            292271,
            284362,
            239196,
            146212,
            306929,
            30429,
            310041,
            305936,
            178054,
            193449,
            20357,
            221581,
            280927,
            281092,
            310191,
            304199,
            307512,
            118644,
            83601,
            222967,
            29118,
            304248,
            100630,
            123947,
            100168,
            60576,
            285578,
            284354,
            101827,
            304362,
            258077,
            289559,
            234100,
            281399,
            201478,
            298834,
            220541,
            175788,
            288631,
            261969,
            289021,
            293180,
            186779,
            276573,
            225960,
            123965,
            298187,
            297691,
            229490,
            163043,
            306834,
            244035,
            20391,
            146563,
            114119,
            296207,
            3688,
            307783,
            257623,
            32406,
            222826,
            301706,
            82601,
            308639,
            141306,
            137156,
            290763,
            91053,
            54324,
            235511,
            303428,
            256862,
            3694,
            18058,
            142288,
            284025,
            178537,
            308929,
            61374,
            25550,
            271827,
            282992,
            294395,
            293091,
            130166,
            22653,
            28371,
            135457,
            290164,
            221673,
            286731,
            303748,
            125442,
            155571,
            296987,
            186802,
            292268,
            183168,
            305034,
            63766,
            240967,
            302755,
            290768,
            285540,
            170941,
            286518,
            293641,
            53233,
            305510,
            300277,
            67759,
            26665,
            39764,
            216501,
            197089,
            280967,
            120494,
            183173,
            269688,
            295057,
            50543,
            254495,
            171553,
            124030,
            238610,
            271797,
            303940,
            164345,
            304856,
            87831,
            309033,
            167886,
            232858,
            304111,
            21345,
            166145,
            45667,
            292968,
            302133,
            206957,
            113476,
            170489,
            309290,
            199914,
            243872,
            299170,
            185159,
            84351,
            285427,
            290693,
            300160,
            298156,
            293294,
            83257,
            296350,
            286428,
            306435,
            153056,
            282973,
            193717,
            77096,
            79,
            290296,
            307868,
            52945,
            284110,
            290571,
            243183,
            12180,
            72050,
            296351,
            277355,
            300287,
            196710,
            107007,
            212246,
            243367,
            39815,
            300640,
            291315,
            25289,
            297774,
            300429,
            4677,
            294996,
            296967,
            89550,
            177159,
            228319,
            286048,
            132593,
            185250,
            19817,
            113477,
            163293,
            12822,
            57143,
            308985,
            187358,
            289040,
            232715,
            80186,
            83401,
            61228,
            295717,
            6811,
            261295,
            286725,
            174250,
            104925,
            24220,
            304285,
            308715,
            303187,
            293652,
            113495,
            292227,
            281733,
            10209,
            28389,
            308138,
            155482,
            95850,
            6848,
            73390,
            281105,
            278318,
            298065,
            284175,
            298640,
            278950,
            30471,
            295471,
            290160,
            255022,
            295420,
            298438,
            85732,
            104764,
            183110,
            160109,
            165255,
            119733,
            269215,
            186957,
            6371,
            48510,
            263709,
            283606,
            281546,
            301036,
            96329,
            261368,
            292732,
            289539,
            296447,
            228024,
            288497,
            291111,
            126439,
            288762,
            203675,
            293001,
            57966,
            309266,
            129145,
            310116,
            285911,
            308594,
            281829,
            40900,
            304348,
            290791,
            281520,
            143900,
            288308,
            282154,
            307090,
            287133,
            118757,
            222338,
            268913,
            120374,
            287862,
            164271,
            153243,
            241316,
            73723,
            261156,
            284345,
            112047,
            284334,
            22787,
            290477,
            283113,
            289176,
            151620,
            296953,
            238340,
            304094,
            302666,
            289330,
            265740,
            240593,
            303455,
            245567,
            157772,
            287608,
            281002,
            202529,
            285186,
            132940,
            281125,
            232094,
            295236,
            158296,
            309028,
            169984,
            302236,
            246994,
            225324,
            205401,
            84563,
            302715,
            208251,
            261158,
            298917,
            28549,
            286232,
            198560,
            282498,
            92311,
            309029,
            249078,
            299962,
            142026,
            300741,
            106152,
            235611,
            226099,
            46168,
            86423,
            300903,
            58812,
            185478,
            305600,
            64008,
            19751,
            10289,
            305470,
            306275,
            39640,
            303319,
            82723,
            293137,
            309009,
            306593,
            219835,
            124047,
            292244,
            68422,
            113030,
            2002,
            174918,
            83119,
            97072,
            302955,
            297824,
            286909,
            112115,
            301800,
            74936,
            51341,
            108844,
            306532,
            196261,
            79226,
            287436,
            295896,
            305500,
            293506,
            293453,
            296011,
            305896,
            292164,
            262594,
            307573,
            307281,
            68177,
            70886,
            221231,
            288862,
            282356,
            46645,
            73767,
            284348,
            299182,
            241512,
            302857,
            250350,
            8199,
            291129,
            300778,
            164541,
            212273,
            199400,
            297155,
            304462,
            272469,
            152122,
            215149,
            297936,
            284872,
            187268,
            63367,
            289281,
            164339,
            278426,
            294831,
            282782,
            301876,
            281433,
            299111,
            77678,
            61938,
            56116,
            218758,
            28001,
            131477,
            232070,
            155657,
            305701,
            300505,
            243850,
            63617,
            250107,
            292245,
            84589,
            282828,
            166191,
            2932,
            192870,
            169877,
            282127,
            12893,
            96460,
            297507,
            284062,
            236650,
            121129,
            16938,
            77966,
            297446,
            217617,
            141356,
            233335,
            215398,
            309714,
            286828,
            16857,
            300075,
            281055,
            82821,
            84381,
            200465,
            305257,
            61094,
            118477,
            231777,
            218311,
            94259,
            17171,
            298246,
            181914,
            295768,
            184882,
            295068,
            299760,
            298053,
            298739,
            3804,
            306383,
            302456,
            113658,
            301521,
            109862,
            50670,
            173984,
            293431,
            260057,
            297162,
            291541,
            101250,
            298179,
            283335,
            273042,
            292324,
            72204,
            289446,
            300213,
            307712,
            218560,
            303953,
            281750,
            86157,
            303627,
            281443,
            309933,
            309320,
            281962,
            280973,
            65968,
            287511,
            306283,
            152805,
            299979,
            292569,
            309072,
            227124,
            300712,
            299010,
            282040,
            136158,
            289269,
            289782,
            287956,
            91084,
            300917,
            143280,
            120410,
            226589,
            289719,
            129012,
            288151,
            213190,
            137900,
            36253,
            2632,
            117474,
            144692,
            285866,
            18368,
            294084,
            184439,
            277509,
            76960,
            49602,
            27837,
            257728,
            298610,
            289520,
            34336,
            285089,
            167250,
            94378,
            289326,
            126469,
            296490,
            295129,
            126233,
            293885,
            287870,
            39752,
            55913,
            106781,
            118283,
            220525,
            165266,
            287960,
            28197,
            131860,
            65224,
            92923,
            300224,
            273796,
            266491,
            143980,
            307656,
            228004,
            185057,
            134808,
            290269,
            279415,
            61354,
            227983,
            103588,
            211133,
            296860,
            240913,
            301205,
            235892,
            195454,
            297870,
            116198,
            297635,
            114900,
            307322,
            125136,
            286941,
            301271,
            161669,
            156544,
            293473,
            104479,
            303733,
            292934,
            246679,
            45107,
            100967,
            297953,
            302467,
            293211,
            297563,
            274187,
            284673,
            260116,
            297355,
            189473,
            31571,
            54728,
            31060,
            255665,
            283808,
            135532,
            130385,
            306908,
            253953,
            307442,
            95630,
            288971,
            137393,
            305880,
            147507,
            304210,
            250162,
            282556,
            289846,
            274332,
            64976,
            298553,
            237043,
            304039,
            289473,
            722,
            38095,
            125454,
            302828,
            129765,
            79755,
            248213,
            89951,
            180199,
            11242,
            304257,
            34733,
            46443,
            259063,
            229217,
            82249,
            124287,
            183745,
            72406,
            296396,
            117293,
            302357,
            163062,
            89420,
            158100,
            124103,
            308953,
            179640,
            306818,
            309038,
            306327,
            228492,
            247377,
            288802,
            282097,
            293075,
            301300,
            76269,
            294748,
            227908,
            144851,
            273528,
            14115,
            286573,
            203584,
            39739,
            66274,
            290013,
            309763,
            117121,
            24708,
            291444,
            300506,
            176498,
            306695,
            80437,
            161598,
            66161,
            263312,
            303051,
            25846,
            206307,
            207418,
            232743,
            32199,
            223082,
            98702,
            309128,
            81068,
            306915,
            305073,
            306745,
            143965,
            283807,
            53807,
            107050,
            295835,
            298688,
            285756,
            302338,
            91630,
            262054,
            188328,
            294277,
            289663,
            286403,
        ];
        $randomIds100 = [
            291820,
            91036,
            307768,
            284196,
            300647,
            270382,
            8199,
            302775,
            73643,
            183745,
            288514,
            281489,
            180800,
            306643,
            27821,
            127475,
            186607,
            290428,
            241982,
            301901,
            302359,
            307141,
            113131,
            296238,
            193151,
            34036,
            289209,
            27689,
            119849,
            144692,
            283713,
            296128,
            141836,
            289212,
            239648,
            301757,
            278636,
            287677,
            305455,
            161021,
            281630,
            213175,
            299959,
            94988,
            291027,
            143234,
            143980,
            245625,
            25028,
            40750,
            96350,
            89304,
            301136,
            307235,
            224885,
            307765,
            28599,
            169229,
            124287,
            186069,
            257046,
            14600,
            305111,
            185559,
            287858,
            258870,
            12961,
            101128,
            172329,
            279930,
            196271,
            192413,
            17414,
            203543,
            114071,
            30281,
            81891,
            282481,
            274486,
            35271,
            302904,
            285656,
            293812,
            285373,
            305378,
            70942,
            283878,
            93567,
            292489,
            74281,
            226514,
            304041,
            290320,
            297445,
            73679,
            233131,
            306162,
            281545,
            305593,
            288494,

        ];

//        while ($numbers > 0) {
//            array_push($randomIds, rand(1, 400000));
//            $numbers--;
//        }

        echo '
        __________________ _______  _______ _________ _        _______ 
        \__   __/\__   __/(  ____ \(  ____ )\__   __/( (    /|(  ____ \
           ) (      ) (   | (    \/| (    )|   ) (   |  \  ( || (    \/
           | |      | |   | (__    | (____)|   | |   |   \ | || |      
           | |      | |   |  __)   |     __)   | |   | (\ \) || | ____ 
           | |      | |   | (      | (\ (      | |   | | \   || | \_  )
           | |   ___) (___| (____/\| ) \ \_____) (___| )  \  || (___) |
           )_(   \_______/(_______/|/   \__/\_______/|/    )_)(_______)
        ';


        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;
        $count = 1;

        $counts = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
        ];
        foreach ($randomIds100 as $id) {
            $company = Company::fetch_company_and_instances($id);
            if ($company) {

                $instances = $company->get_company_instances();
                $tier      = $instances->get_rows()[0]->instanceTierThyself(1);
                $counts[$tier]++;
            }

            $count++;
        }
//        while ($count <= 310198) {
//            $company = Company::fetch_company_and_instances($count);
//            if($company){
//
//                $instances = $company->get_company_instances();
//                $tier      = $instances->get_rows()[0]->instanceTierThyself(1);
//                $counts[$tier]++;
//            }
//
//            $count++;
//        }
        echo $count . ' records' . PHP_EOL;
        var_dump($counts);
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
//        $company = Company::fetch_company_and_instances(26602);
//
//        $instances =  $company->get_company_instances();
//
//        var_dump($instances->get_rows()[0]->instanceTierThyself(1));
    }


    /**
     * php run.php  meroveus match -e development
     *
     * @var $sanity bool will write files for you to peruse for debugging
     * @var $debug  bool turns off any db inserts/updates
     */
    public function matchAction($sanity = false, $debug = false)
    {
//        $debug = true;
        echo '
             ███▄ ▄███▓    ▄▄▄         ▄▄▄█████▓    ▄████▄      ██░ ██     ██▓    ███▄    █      ▄████
            ▓██▒▀█▀ ██▒   ▒████▄       ▓  ██▒ ▓▒   ▒██▀ ▀█     ▓██░ ██▒   ▓██▒    ██ ▀█   █     ██▒ ▀█▒
            ▓██    ▓██░   ▒██  ▀█▄     ▒ ▓██░ ▒░   ▒▓█    ▄    ▒██▀▀██░   ▒██▒   ▓██  ▀█ ██▒   ▒██░▄▄▄░
            ▒██    ▒██    ░██▄▄▄▄██    ░ ▓██▓ ░    ▒▓▓▄ ▄██▒   ░▓█ ░██    ░██░   ▓██▒  ▐▌██▒   ░▓█  ██▓
            ▒██▒   ░██▒    ▓█   ▓██▒     ▒██▒ ░    ▒ ▓███▀ ░   ░▓█▒░██▓   ░██░   ▒██░   ▓██░   ░▒▓███▀▒
            ░ ▒░   ░  ░    ▒▒   ▓▒█░     ▒ ░░      ░ ░▒ ▒  ░    ▒ ░░▒░▒   ░▓     ░ ▒░   ▒ ▒     ░▒   ▒
            ░  ░      ░     ▒   ▒▒ ░       ░         ░  ▒       ▒ ░▒░ ░    ▒ ░   ░ ░░   ░ ▒░     ░   ░
            ░      ░        ░   ▒        ░         ░            ░  ░░ ░    ▒ ░      ░   ░ ░    ░ ░   ░
                   ░            ░  ░               ░ ░          ░  ░  ░    ░              ░          ░
                                                   ░
                                                     ░
';
        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;

        echo 'while you wait: https://www.youtube.com/watch?v=siwpn14IE7E' . PHP_EOL;

        $maxRows      = 500;
        $totalMatched = $totalInserted = $marketMatched = $marketInserted = 0;
        /** @var  $contactService \Services\Meroveus\ContactService */
        $this->contactService = $this->getServiceLocator()->get('Services\Meroveus\ContactService');

        $lastMemUsageMessageLength = 0;

        $formatter = Meroveus::get_instance();

        // setup our meroveus params
        $meroveusParams = [
            'STARTROW' => 1,
            'MAXROWS'  => $maxRows,
            'SET'      => [
                'RECTYP' => 'Business',
            ],
            'KEYWORDS' => 'published:true',
            'ENV'      => '',
            'META'     => [
                'RECTYP' => 'Business',
                'FIELDS' => [
                    [
                        "KEY"  => "keyexec-set_static",
                        "TYP"  => "Person",
                        'META' => [
                            'FIELDS' => [
                                [
                                    "KEY" => "department-title_static",
                                    "TYP" => "Text",
                                ],

                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($this->markets as $market => $env) {

            $meroveusParams['ENV']      = $env;
            $meroveusParams['STARTROW'] = 1; // reset our pagination offset
            $marketMatched              = $marketInserted = 0; // reset counts for this market

            // paginate over companies
            while ($marketCompanyList = $this->companyService->fetchByMarket($meroveusParams)) {

                if (!$marketCompanyList) {
                    echo '                  No results returned for ' . $market . PHP_EOL;
                }

                foreach ($marketCompanyList as $index => $target) {

                    $company           = $formatter->format($target);
                    $match             = $this->elasticMatch($target);
                    $companyInstanceId = null;

                    if ($match) {

                        if (!$debug) {

                            $companyInstanceId = $this->processMatch($match->getSource()['InternalId'], $target);

                            if ($sanity) {
                                $this->writeSanityFiles($market, $target, $match);
                            }

                            $marketMatched++;
                            $totalMatched++;
                        }

                    } else { // create a new record

                        if (!$debug) {
                            $company->save();
                            $companyInstanceId = $company->get_company_instances()->first()->companyInstanceId;
                        }

                        $marketInserted++;
                        $totalInserted++;
                    }

                    // does this company have an industry?
                    /*if ( isset($target['firm-industry_static']) ) {

                        // get all meroveus industries for this company by ID
                        $selectMeroveusIndustry = $this->db->prepare("
                                                SELECT
                                                    *
                                                FROM
                                                  `datahub`.`meroveus_industry`
                                                WHERE `industry` IN ({$target['firm-industry_static']})");

                        if ( $selectMeroveusIndustry->execute() ) {

                            // link each industry to the company
                            while ( $industry = $selectMeroveusIndustry->fetch(\PDO::FETCH_ASSOC) ) {
                                try {
                                    $insertCompanyMeroveusIndustry->execute (
                                        [
                                            ':hub_id'               => $hubId,
                                            ':meroveus_industry_id' => $industry['meroveus_industry_id'],
                                        ]);
                                } catch (\Exception $e) {
                                    // probably a dupe, no biggie
                                }
                            }

                        }

                        $selectMeroveusIndustry->closeCursor();
                    }*/

                    // process contacts
                    if ($companyInstanceId || $debug) {
                        $this->processContacts($companyInstanceId, $target['execs'], $debug);
                    }

                    if ($debug) {
                        // track memory and total count
                        echo "\033[{$lastMemUsageMessageLength}D";
                        $total                     = $totalInserted + $totalMatched;
                        $currentLoopInsertionCount = $index + 1;
                        $memory                    = $total . ':' . $currentLoopInsertionCount . ':' . $this->convert_memory_usage(memory_get_usage(true));
                        $lastMemUsageMessageLength = strlen($memory);
                        echo $memory;
                    }
                }

                // get next chunk of rows
                $meroveusParams['STARTROW'] += $maxRows;
            }

            echo PHP_EOL . $market . ':' . PHP_EOL;
            echo " {$marketMatched} records matched, " . PHP_EOL;
            echo " {$marketInserted} records created" . PHP_EOL;

            echo "              post market out of loop memory usage is " . $this->convert_memory_usage(memory_get_usage(true)) . PHP_EOL;
        }

        echo $totalMatched . ' total  records matched ' . PHP_EOL;
        echo $totalInserted . ' total records inserted ' . PHP_EOL;
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
        echo 'Enjoy your day' . PHP_EOL;
    }


    /**
     * @param $companyHubId
     * @param $contacts
     * @param $debug
     */
    private function processContacts($companyHubId, $contacts, $debug)
    {

        foreach ($contacts as $contact) {
            if (!empty($contact)) {
                // attach the company hub id to the contact, format it and add it
                $contact['hub_id'] = $companyHubId;
                $formattedContact  = $this->contactService->formatMeroveusContact($contact, $this->jobIdDictionary);
                /** @var \DB\Datahub\Contact $formattedContact */


                if (!$debug) {
                    if (!empty($formattedContact)) {
                        $formattedContact->companyInstanceId = $companyHubId;
                        $formattedContact->save();
//                    try {
//                        $this->addContactPdo->execute($formattedContact);
//                    } catch (\PDOException $e) {
//                        echo "PDO ERROR: " . $e->getMessage() . PHP_EOL;
//                    }
//                    if ($formattedContact['job_position_id'] === 1001 && $formattedContact['job_title']) {
//                        $unrankedJobs[$formattedContact['job_title']] = 1001;
//                    }
                    }
                }
            }
        }
    }

    /**
     * Exports companies that do not have a meroveus id for relevate to match
     */
    public function exportRelevateAction()
    {

        // get user provided file path or default to ours
        @$outFilePath = $this->getRequest()->getParam('out') ?: 'relevate-' . time() . '.csv';

        // open file, then erase or attempt to create
        $file = fopen($outFilePath, 'w');

        if (file_exists($outFilePath)) {

            $headerRow = [
                'record_uid',
                'pub_uid',
                'record_name',
                'address1',
                'address2',
                'address3',
                'city',
                'state',
                'zip',
                'zip4',
                'phone',
                'fax',
                'public_email',
                'website',
            ];

            // write header row
            fputcsv($file, $headerRow);

            /** @var  $companyStatement \mysqli_stmt */
            $companyStatement = $this->sqlStatementsArray['selectCompaniesWithoutMeroveusId'];

            // sql pagination setup
            $queryParams = [
                ':offset' => 0,
                ':limit'  => 1000,
            ];

            $count = 0;

            // while we are getting rows back
            while ($companyStatement->execute($queryParams) && $companyStatement->rowCount() > 0) {

                // save each row to the csv file
                while ($row = $companyStatement->fetch()) {

                    // postal_code is zipPlus4 so split on the dash
                    $zipParts = preg_split('/\-/', $row['postal_code'], -1, PREG_SPLIT_NO_EMPTY);

                    // write this row to file
                    fputcsv($file, [
                        $row['hub_id'],
                        0,                   // pub_id doesn't matter
                        $row['company_name'],
                        $row['address1'],
                        $row['address2'],
                        '',                  // no address 3 field on our side
                        $row['city'],
                        $row['state'],
                        @$zipParts[0],       // zip
                        @$zipParts[1] ?: '', // zip4
                        $row['phone'],
                        '',                  // no fax field
                        '',                  // no email
                        $row['website'],
                    ]);

                    $count++;
                }

                // lil bit o status
                echo '.';

                // setup for next round of sql results
                $queryParams[':offset'] += $queryParams[':limit'];
            }

            fclose($file);

            echo PHP_EOL . "exported {$count} companies to " . realpath($outFilePath);
        }


    }

    /**
     * Updates meroveus_industry table with payload from meroveus
     */
    public function updateIndustriesAction()
    {

        $meroveusParams = [
            "KEYWORDS" => "",
            "MODE"     => "LABELSEARCH",
            "LABELS"   => [
                [
                    "NAME"      => "",
                    "DATACLASS" => [
                        "KEY" => "industry",
                    ],
                ],
            ],
        ];

        // @todo handle deletions
        $industries = $this->companyService->queryMeroveusRoot($meroveusParams);

        foreach ($industries as $industry) {
            $this->sqlStatementsArray['insertMeroveusIndustry']->execute([
                ':external_id' => $industry['LABELID'],
                ':industry'    => trim($industry['NAME'], 'Â '),
            ]);

        }
    }

    public function sicToMerovuesAction()
    {

        // https://docs.google.com/spreadsheets/d/1FbPmppl5ehF0Kbwu6UXcJAOhmYSmIMIiXiD2AXtYklY/edit#gid=939757750
        // just save link as csv

        $filePath = $this->getRequest()->getParam('file');

        if (!$filePath) {
            die ('run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if (!$filePath) {
            die ("--file does not exist: " . $this->getRequest()->getParam('file'));
        }

        $file = new CsvIterator($filePath);
        $file->setHasHeaderRow(true);

        $sql = $this->db->prepare("INSERT INTO
              `datahub`.`sic_code_meroveus_industry_map` (`sic`, `meroveus_industry_id`)
            SELECT
                s.sic,
                m.meroveus_industry_id
            FROM
                `datahub`.`sic_code` s
                LEFT JOIN `datahub`.`meroveus_industry` m ON m.industry = ?
            WHERE
                s.sic LIKE ?
                AND m.meroveus_industry_id IS NOT NULL

            UNION

            SELECT
                c.sic_code,
                m.meroveus_industry_id
            FROM
                `datahub`.`company` c
                LEFT JOIN `datahub`.`meroveus_industry` m ON m.industry = ?
            WHERE
                c.sic_code LIKE ?
                AND m.meroveus_industry_id IS NOT NULL");

        foreach ($file as $line) {
            $line = $file->mergeWithHeaderRow($line);

            $sql->execute([
                $line['DataHub Industry'],
                $line['SIC'] . '%',
                $line['DataHub Industry'],
                $line['SIC'] . '%',
            ]);
        }

    }

    /**
     * Map third party sic codes to a meroveus_industry_id and link to a company via a provided
     * hub_id
     *
     * @throws \Exception
     */
    public function mapThirdPartySicAction()
    {

        $filePath = $this->getRequest()->getParam('file');

        if (!$filePath) {
            die ('run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if (!$filePath) {
            die ("--file does not exist: " . $this->getRequest()->getParam('file'));
        }

        // load csv file
        $file = new CsvIterator($filePath);
        $file->setHasHeaderRow(true);

        // get all sic_codes that match the given sic code regex and insert provided meroveus_id and mapped
        // meroveus_industry_ids into company_meroveus_industry_third_party_map
        $sql = $this->db->prepare('INSERT INTO
                `datahub`.`company_meroveus_industry_third_party_map` (`meroveus_industry_id`, `hub_id`)
            SELECT
                DISTINCT(m.meroveus_industry_id),
                ?
            FROM
                `datahub`.`sic_code` s
                LEFT JOIN `datahub`.`sic_code_meroveus_industry_map` m USING (`sic`)
            WHERE
                s.sic REGEXP ?
                AND m.meroveus_industry_id IS NOT NULL');

        // loop over each line
        foreach ($file as $line) {

            $line = $file->mergeWithHeaderRow($line);

            // no hub_id is no good
            if (empty($line['hub_id'])) {
                continue;
            }

            // build all sic codes into regex string '^\d\d.*'
            $sicCodes = [];
            if (!empty($line['PrimarySIC'])) {
                $sicCodes[] = '^' . substr($line['PrimarySIC'], 0, 2) . '.*';
            }
            if (!empty($line['SICSecondary1'])) {
                $sicCodes[] = '^' . substr($line['SICSecondary1'], 0, 2) . '.*';
            }
            if (!empty($line['SICSecondary2'])) {
                $sicCodes[] = '^' . substr($line['SICSecondary2'], 0, 2) . '.*';
            }
            if (!empty($line['SICSec3'])) {
                $sicCodes[] = '^' . substr($line['SICSec3'], 0, 2) . '.*';
            }
            if (!empty($line['SICSec4'])) {
                $sicCodes[] = '^' . substr($line['SICSec4'], 0, 2) . '.*';
            }

            // need at least one sic code
            if (empty($sicCodes)) {
                continue;
            }

            // link matched meroveus industries to a company
            $sql->execute([
                $line['hub_id'],
                implode('|', $sicCodes),
            ]);
        }


    }

    /**
     * attempt to match the record with whats in elastic and
     * return pertinent data for further processing
     *
     * @param array $target   ( what we're trying to match in elastic)
     * @param float $minScore ( our score thresh hold )
     *
     * @return mixed array/bool
     * query elastic for match
     *
     */
    private function elasticMatch(array $target, $minScore = 9.9)
    {
        if (empty($target)) {
            echo 'empty target passed to elasticMatch' . PHP_EOL;

            return false;
        }

        // pull out search terms
        $queryFields = [
            'Name'       => isset($target['firm-name_static']) ? $target['firm-name_static'] : false,
            'State'      => isset($target['street-state_static']) ? $target['street-state_static'] : false,
            'Addr1'      => isset($target['street-address_static']) ? $target['street-address_static'] : false,
            'City'       => isset($target['street-city_static']) ? $target['street-city_static'] : false,
            'PostalCode' => isset($target['street-zip_static']) ? $target['street-zip_static'] : false,
        ];

        // make sure that we have everything that we need
        foreach ($queryFields as $field) {
            if (!$field) {
                return false;
            }
        }

        $this->elasticQuery->setQuery($this->elasticQueryBuilder->query()->bool()->addMust($this->elasticQueryBuilder->query()->match('Name',
            $queryFields['Name']))->addMust($this->elasticQueryBuilder->query()->match('City',
            $queryFields['City']))->addMust($this->elasticQueryBuilder->query()->match('State',
            $queryFields['State']))->addMust($this->elasticQueryBuilder->query()->match('PostalCode',
            $queryFields['PostalCode'])));


        // set the minimum score that we consider a match
        // https://www.elastic.co/guide/en/elasticsearch/reference/current/search-request-min-score.html
        $this->elasticQuery->setMinScore($minScore);
        $resultSet    = $this->elasticSearch->search($this->elasticQuery);
        $topScore     = $resultSet->getMaxScore();
        $resultsArray = $resultSet->getResults();

        $result = false;
        if (!empty($resultsArray)) {
            $result = ($resultsArray[0]->getScore() === $topScore) ? $resultsArray[0] : $result;
        }

        return $result;
    }

    /**
     * updates the existing refinery record
     *
     * @param  $refineryId            int
     * @param  $target                array
     *                                //@todo rethink this in light of testing
     *
     * @return bool
     */
    // gross!!!
    private function processMatch($refineryId, array $target)
    {

        $companyInstances = CompanyInstance::fetch_by_source_name_and_id('refinery%', $refineryId);

        if ($companyInstances === false) {
            return false;
        }

        $params = [
            'universal_revenue_volume_static'   => empty($target['universal-revenue-volume_static']) ? null : $target['universal-revenue-volume_static'],
            'universal_employee_count_static'   => empty($target['universal-employee-count_static']) ? null : $target['universal-employee-count_static'],
            'universal_employee_local_static'   => empty($target['universal-employee-local_static']) ? null : $target['universal-employee-local_static'],
            'universal_established_year_static' => empty($target['universal-established-year_static']) ? null : $target['universal-established-year_static'],
            'universal_profile_blob_static'     => empty($target['universal-profile-blob_static']) ? null : $target['universal-profile-blob_static'],
        ];

        foreach ($params as $name => $value) {
            $companyInstances->first()->add_property(new CompanyInstanceProperty([
                'name'         => $name,
                'value'        => $value,
                'sourceTypeId' => SourceType::fetch_one_where("name = 'meroveus'")->sourceTypeId,
                'sourceId'     => $target['meroveusId'],
                'createdAt'    => $target['createdAt'],
                'updatedAt'    => $target['updatedAt'],
            ]));
        }

        $companyInstances->first()->save();

        return $companyInstances->first()->companyInstanceId;
    }


    /**
     * mostly useful for debugging and query tuning
     *
     * @param $market
     * @param $target
     * @param $elasticResult
     *
     * @return bool
     *
     */
    private function writeSanityFiles($market, $target, $elasticResult)
    {
        ksort($target);
        $keepArray = [
            'firm-name_static',
            'street-address_static',
            'street-city_static',
            'street-state_static',
            'street-zip_static',
        ];

        if ($elasticResult) {
            $filename = '/tmp/' . $market . 'hits.txt';
        } else {
            $filename = '/tmp/' . $market . 'misses.txt';
        }

        $fd = fopen($filename, 'a');

        $count = 0;
        foreach ($target as $key => $field) {

            if (in_array($key, $keepArray)) {
                $count++;
            }
        }
        fputs($fd, 'count: ' . $count . ', ');
        foreach ($target as $key => $field) {

            if (in_array($key, $keepArray)) {
                fputs($fd, $key . ': ' . $field . ', ');
            }
        }

        fputs($fd, PHP_EOL);
        fclose($fd);

        return true;
    }

    /**
     * @param $size
     *
     * @return string
     */
    private function convert_memory_usage($size)
    {

        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

        return @round($size / pow(1024, ($i = (int)floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }


}
