<?php
/**
 * Computes and compares nilsimsa codes.
 *
 * A nilsimsa code is something like a hash, but unlike hashes, a small
 * change in the message results in a small change in the nilsimsa
 * code. Such a function is called a locality-sensitive hash.
 *
 * PHP Port of Python port of nilsimsa-20050414.rb from Ruby
 *
 * PHP port by Mike Lampson at ACBJ
 * Python port by Michael Itz at MetaCarta
 * svn export http://py-nilsimsa.googlecode.com/svn/trunk/
 * Original comments from Ruby version:
 * ----------------------------------------------------------
 * Nilsimsa hash (build 20050414)
 * Ruby port (C) 2005 Martin Pirker
 * released under GNU GPL V2 license
 *
 * inspired by Digest::Nilsimsa-0.06 from Perl CPAN and
 * the original C nilsimsa-0.2.4 implementation by cmeclax
 * http://ixazon.dynip.com/~cmeclax/nilsimsa.html (dead URL)
 * ----------------------------------------------------------
 */
namespace Services\Nilsimsa;

//use Zend\Stdlib\ErrorHandler;
use Services\AbstractClient;

class Client extends AbstractClient
{
    /**
     * Convience variables for handling ported data
     *
     * @var string
     */
    protected $trantext;
    protected $popctext;

    /**
     * Nilsimsa Trigram statistic array
     * @var array
     */
    protected $tran;

    /**
     * Array used in comparing bit differences between digests
     * @var array
     */
    protected $popc;

    /**
     * Counter
     * @var integer
     */
    protected $count = 0;

    /**
     * Accumulators for computing digest
     * @var array
     */
    protected $acc;

    /**
     * Last four seen characters (-1 until set)
     * @var array
     */
    protected $lastch = array(-1, -1, -1, -1);

    /**
     * Initialize data structures
     *
     * @return self
     */
    public function init()
    {
        /*
         * Data structures from port.
         */
        $this->trantext = "\x02\xD6\x9E\x6F\xF9\x1D\x04\xAB\xD0\x22\x16\x1F\xD8\x73\xA1\xAC"
                    . "\x3B\x70\x62\x96\x1E\x6E\x8F\x39\x9D\x05\x14\x4A\xA6\xBE\xAE\x0E"
                    . "\xCF\xB9\x9C\x9A\xC7\x68\x13\xE1\x2D\xA4\xEB\x51\x8D\x64\x6B\x50"
                    . "\x23\x80\x03\x41\xEC\xBB\x71\xCC\x7A\x86\x7F\x98\xF2\x36\x5E\xEE"
                    . "\x8E\xCE\x4F\xB8\x32\xB6\x5F\x59\xDC\x1B\x31\x4C\x7B\xF0\x63\x01"
                    . "\x6C\xBA\x07\xE8\x12\x77\x49\x3C\xDA\x46\xFE\x2F\x79\x1C\x9B\x30"
                    . "\xE3\x00\x06\x7E\x2E\x0F\x38\x33\x21\xAD\xA5\x54\xCA\xA7\x29\xFC"
                    . "\x5A\x47\x69\x7D\xC5\x95\xB5\xF4\x0B\x90\xA3\x81\x6D\x25\x55\x35"
                    . "\xF5\x75\x74\x0A\x26\xBF\x19\x5C\x1A\xC6\xFF\x99\x5D\x84\xAA\x66"
                    . "\x3E\xAF\x78\xB3\x20\x43\xC1\xED\x24\xEA\xE6\x3F\x18\xF3\xA0\x42"
                    . "\x57\x08\x53\x60\xC3\xC0\x83\x40\x82\xD7\x09\xBD\x44\x2A\x67\xA8"
                    . "\x93\xE0\xC2\x56\x9F\xD9\xDD\x85\x15\xB4\x8A\x27\x28\x92\x76\xDE"
                    . "\xEF\xF8\xB2\xB7\xC9\x3D\x45\x94\x4B\x11\x0D\x65\xD5\x34\x8B\x91"
                    . "\x0C\xFA\x87\xE9\x7C\x5B\xB1\x4D\xE5\xD4\xCB\x10\xA2\x17\x89\xBC"
                    . "\xDB\xB0\xE2\x97\x88\x52\xF7\x48\xD3\x61\x2C\x3A\x2B\xD1\x8C\xFB"
                    . "\xF1\xCD\xE4\x6A\xE7\xA9\xFD\xC4\x37\xC8\xD2\xF6\xDF\x58\x72\x4E";
        $this->popctext = "\x00\x01\x01\x02\x01\x02\x02\x03\x01\x02\x02\x03\x02\x03\x03\x04"
                    . "\x01\x02\x02\x03\x02\x03\x03\x04\x02\x03\x03\x04\x03\x04\x04\x05"
                    . "\x01\x02\x02\x03\x02\x03\x03\x04\x02\x03\x03\x04\x03\x04\x04\x05"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x01\x02\x02\x03\x02\x03\x03\x04\x02\x03\x03\x04\x03\x04\x04\x05"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x03\x04\x04\x05\x04\x05\x05\x06\x04\x05\x05\x06\x05\x06\x06\x07"
                    . "\x01\x02\x02\x03\x02\x03\x03\x04\x02\x03\x03\x04\x03\x04\x04\x05"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x03\x04\x04\x05\x04\x05\x05\x06\x04\x05\x05\x06\x05\x06\x06\x07"
                    . "\x02\x03\x03\x04\x03\x04\x04\x05\x03\x04\x04\x05\x04\x05\x05\x06"
                    . "\x03\x04\x04\x05\x04\x05\x05\x06\x04\x05\x05\x06\x05\x06\x06\x07"
                    . "\x03\x04\x04\x05\x04\x05\x05\x06\x04\x05\x05\x06\x05\x06\x06\x07"
                    . "\x04\x05\x05\x06\x05\x06\x06\x07\x05\x06\x06\x07\x06\x07\x07\x08";

        // table used in computing trigram statistics
        //   TRAN[x] is the accumulator that should be incremented when x
        //   is the value observed from hashing a triplet of recently
        //   seen characters (done in Nilsimsa.tran3(a, b, c, n))
        $this->tran = array();
        foreach (str_split($this->trantext) as $chr) {
            $this->tran[] = ord($chr);
        }

        // table used in comparing bit differences between digests
        //   POPC[x] = <number of 1 bits in x>
        //     so...
        //   POPC[a^b] = <number of bits different between a and b>
        $this->popc = array();
        foreach (str_split($this->popctext) as $chr) {
            $this->popc[] = ord($chr);
        }

        // num characters seen
        $this->count = 0;
        // accumulators for computing digest
        $this->acc = array_fill(0, 256, 0);
        // last four seen characters (-1 until set)
        $this->lastch = array(-1, -1, -1, -1);

        return $this;
    }

    /**
     * Get accumulator for a transition n between chars a, b, c.
     *
     * @param integer $a
     * @param integer $b
     * @param integer $c
     * @param integer $n
     * @return integer
     */
    protected function tran3($a, $b, $c, $n)
    {
        $trann = $this->tran[$n];
        return ( ( (($this->tran[(($a+$n) & 255)] ^ $this->tran[$b]) * ($n+$n+1)) + $this->tran[($c^$trann)]) & 255);
    }

    /**
     * Add data to running digest, increasing the accumulators for 0-8
     *    triplets formed by this char and the previous 0-3 chars.
     *
     * @param string $data
     * @return void
     */
    public function update($data)
    {
        $filtered_data = preg_replace('/\s+/', ' ', strip_tags($data));
        foreach (str_split($filtered_data) as $chr) {
            $ch = ord($chr);
            $this->count += 1;

            # incr accumulators for triplets
            if ($this->lastch[1] > -1) {
                $this->acc[$this->tran3($ch, $this->lastch[0], $this->lastch[1], 0)] +=1;
            }
            if ($this->lastch[2] > -1) {
                $this->acc[$this->tran3($ch, $this->lastch[0], $this->lastch[2], 1)] +=1;
                $this->acc[$this->tran3($ch, $this->lastch[1], $this->lastch[2], 2)] +=1;
            }
            if ($this->lastch[3] > -1) {
                $this->acc[$this->tran3($ch, $this->lastch[0], $this->lastch[3], 3)] +=1;
                $this->acc[$this->tran3($ch, $this->lastch[1], $this->lastch[3], 4)] +=1;
                $this->acc[$this->tran3($ch, $this->lastch[2], $this->lastch[3], 5)] +=1;
                $this->acc[$this->tran3($this->lastch[3], $this->lastch[0], $ch, 6)] +=1;
                $this->acc[$this->tran3($this->lastch[3], $this->lastch[2], $ch, 7)] +=1;
            }

            # adjust last seen chars
            $this->lastch = array_slice($this->lastch, 0, 3);
            array_unshift($this->lastch, $ch);
        }
    }

    /**
     * Generate a nilsimsa digest for a text structure
     *
     * @param string $data
     * @return array
     */
    public function digest($data)
    {
        // Reinitialize so that a single instance of the service can be used to create multiple digests.
        $this->init();
        $this->update($data);

        $total = 0;                           # number of triplets seen
        if ($this->count == 3) {
            # 3 chars = 1 triplet
            $total = 1;
        } elseif ($this->count == 4) {
            # 4 chars = 4 triplets
            $total = 4;
        } elseif ($this->count > 4) {
            # otherwise 8 triplets/char less
            # 28 'missed' during 'ramp-up'
            $total = 8 * $this->count - 28;
        }

        $threshold = $total / 256;             # threshold for accumulators

        $code = array_fill(0, 32, 0);              # start with all zero bits
        foreach (range(0, 255) as $i) {             # for all 256 accumulators
            if ($this->acc[$i] > $threshold) {     # if it meets the threshold
                $code[$i >> 3] += 1 << ($i & 7);   # set corresponding digest bit
            }
        }

        return array_reverse($code);  # reverse the byte order in result

    }

    /**
     * Generate a nilsimsa digest for a text structure
     *
     * @param string $data
     * @return string
     */
    public function hexdigest($data)
    {
        $data = trim($data);
        return (empty($data) ? null : vsprintf(str_repeat('%02x', 32), $this->digest($data)));
    }

    /**
     * Compare two nilsimsa digests with each other
     *
     * Note: To check the results of this method to the original python, use the
     * following command: python run_nilsimsa.py --compare_hexdigests $digest1 $digest2
     * 
     * @param string $digest1_str
     * @param string $digest2_str
     * @return integer
     */
    public function compare($digest1_str, $digest2_str)
    {
        # convert to 32-tuple of unsighed two-byte INTs
        $digest1 = array_map(function ($a) { return hexdec($a); }, str_split($digest1_str, 2));
        $digest2 = array_map(function ($a) { return hexdec($a); }, str_split($digest2_str, 2));
        $bits = 0;
        foreach (range(0, 31) as $i) {
            $bits += $this->popc[(255 & $digest1[$i]) ^ $digest2[$i]];
        }
        return 128 - $bits;
    }

    /**
     * Compare a nilsimsa digest with an array of digests, returning the
     * closest match that is above the threshold value.
     *
     * @param string $digest1
     * @param integer $threshold
     * @param array $digestlist
     * @return string
     */
    public function compareDigests($digest1, $threshold, array $digestlist)
    {
        $match = -128;
        $return = null;
        if (!empty($digest1)) {
            foreach ($digestlist as $digest2) {
                $test = $this->compare($digest1, $digest2);
                if ($test > $threshold && $test > $match) {
                    $match = $test;
                    $return = $digest2;
                }
            }
        }
        return $return;
    }
}
