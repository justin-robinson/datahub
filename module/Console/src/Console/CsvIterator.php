<?php

namespace Console;

/**
 * Class FileIterator
 * @package Console
 */
class CsvIterator extends \SplFileObject
{

    /**
     * @var bool
     */
    private $hasHeaderRow = false;

    /**
     * @var string[] cache for the header row if we have one
     */
    private $headerRow;

    /**
     * CsvIterator constructor.
     *
     * @param        $file_name
     * @param string $open_mode
     * @param bool   $use_include_path
     * @param null   $context
     */
    public function __construct($file_name, $open_mode = "r", $use_include_path = false, $context = null)
    {

        parent::__construct($file_name, $open_mode, $use_include_path, $context);

        // set to csv and skip empty lines
        $this->setFlags(self::READ_CSV | self::READ_AHEAD | self::SKIP_EMPTY);
    }

    /**
     *
     */
    public function rewind()
    {

        parent::rewind();

        // if we have a header row, skip to it on rewind
        if ($this->getHasHeaderRow()) {
            $this->seek(1);
        }
    }

    /**
     * @return bool
     */
    public function getHasHeaderRow()
    {

        return $this->hasHeaderRow;
    }

    /**
     * @param bool $hasHeaderRow
     */
    public function setHasHeaderRow($hasHeaderRow)
    {

        $this->hasHeaderRow = $hasHeaderRow;
    }

    /**
     * Exchanges keys of $row with the values of the header row
     * Put this in its own function instead of overriding current() so it doesn't break loops
     * @params $row
     * @return array
     * @throws \Exception
     */
    public function mergeWithHeaderRow($row)
    {

        @$row = array_combine($this->getHeaderRow(), $row);

        if ($row === false) {
            $lineNumber = $this->key() + 1;
            throw new CsvIteratorException(
                "line {$lineNumber} is not properly formatted and failed to insert");
        }

        return $row;

    }

    /**
     * @return array|string
     */
    public function getHeaderRow()
    {

        if (!isset($this->headerRow)) {

            // remember where we are
            $originalLine = $this->key();

            // get header row
            $this->seek(0);
            $this->headerRow = $this->current();

            // go back where we started
            $this->seek($originalLine);

        }

        return $this->headerRow;
    }

}
