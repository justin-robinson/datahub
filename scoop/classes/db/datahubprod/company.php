<?php

namespace DB\DatahubProd;

use DB\DatahubProd\CompanyInstance;
use Scoop\Database\Rows;

/**
 * Class Company
 * @package DB\DatahubProd
 * @author jrobinson (robotically)
 * @date 2016/09/12
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class Company extends \DBCore\DatahubProd\Company {

    /**
     * abbreviations we will expand in the company name for normalization
     *
     * BREAKDOWN OF FIRST REGEX
     * /    : beginning of regex
     * \b   : matches a word boundary
     * corp : literally matches 'corp'
     * \b   : matches another word boundary ( including EOLs )
     * \.?  : optionally matches a literal period
     * /    : end of regex
     * i    : case insensitive match
     *
     * @var array
     */
    protected $companyNameNormalizationRegexStrings = [
        'Corporation'                            => [
            '/\bcorp\b\.?/i',
        ],
        'Incorporated'                           => [
            '/\binc\b\.?/i',
        ],
        'Limited Liability Parternship'          => [
            '/\bllp\b\.?/i',
        ],
        'Limited Partnership'                    => [
            '/\blp\b\.?/i',
        ],
        'Limited Liability Limited Partnership'  => [
            '/\bllp\b\.?/i',
        ],
        'Limited Liability Company'              => [
            '/\bllc\b\.?/i',
            '/\blc\b\.?/i',
            '/\bltd\b\.?/i',
            '/\bco\b\.?/i',
        ],
        'Professional Limited Liability Company' => [
            '/\bpllc\b\.?/i',
        ],
        'Professional Corporation'               => [
            '/\bpc\b\.?/i',
            '/\bp\.c\b\./i',
        ],
    ];

    /**
     * search array used on str_replace for name normalization
     *
     * @var string[]
     */
    protected static $companyNameNormalizationSearch;

    /**
     * replace array used on str_replace for name normalization
     *
     * @var string[]
     */
    protected static $companyNameNormalizationReplace;

    public function __construct(array $dataArray)
    {

        // build array of abbreviations to expand in the company name for normalization
        if (is_null(self::$companyNameNormalizationReplace) || is_null(self::$companyNameNormalizationSearch)) {
            foreach ($this->companyNameNormalizationRegexStrings as $replacement => &$finds) {
                foreach ($finds as $find) {
                    self::$companyNameNormalizationSearch[]  = $find;
                    self::$companyNameNormalizationReplace[] = $replacement;
                }
            }
        }

        parent::__construct($dataArray);
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {

        // autoset the normalized name if we are setting the company name
        // also normalize the name value
        if ($name === 'name') {
            // expand company abbreviations and lowercase the name
            $normalizedName = preg_replace(self::$companyNameNormalizationSearch,
                self::$companyNameNormalizationReplace, $value);

            // strip out anything that isn't a letter or number
            $normalizedName = preg_replace('/[^\w\d]/', '', $normalizedName);

            $this->normalizedName = strtolower($normalizedName);
        }

        parent::__set($name, $value);
    }

}

?>
