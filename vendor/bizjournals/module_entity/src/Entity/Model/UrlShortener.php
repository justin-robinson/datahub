<?php

namespace Entity\Model;

class UrlShortener extends Base
{
    /**
     * Doctrine entity class name
     *
     * @var string $entity_class      Doctrine entity class name
     * @access protected
     */
    protected $entity_class = 'Entity\Bizj\UrlShortener';

    const BASE = 36;

    const HOST = 'http://bizj.us/';

    /**
     * Function used in generating short version
     */
    private function toBase($id)
    {
        $alphabet = range('a','z');

        $numeral = '';
        do {
          $digit = $id % self::BASE;
          $numeral .= ($digit < 10 ? $digit : $alphabet[$digit - 10]);
        } while ($id = intval($id / self::BASE));

        return strrev($numeral);
    }

    /**
     * Given a long url, create the shortened version
     * @param string $url full url
     * @param string $market market code
     * @return string
     */
    public function shorten($url, $market = 'bizjournals')
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false || substr($url, 0, 4) !== 'http') {
            return '';
        }

        // also add blacklist urls to admin tool publishing/controllers/LinkshortenerController
        $badUrls = array(
            'admin.bizjournals.com',
            'cms.bizjournals.com',
            'staging.bizjournals.com',
            'preview.bizjournals.com',
        );
        foreach ($badUrls as $badUrl) {
            if (strpos($url, $badUrl) !== false) {
                return $url;
            }
        }

        //Add www to the URL if it is missing and using bypass param
        if (strpos($url, 'b=') !== false) {
            $url = str_replace('http://bizjournals.com/', 'http://www.bizjournals.com/', $url);
        }

        $em = $this->getEntityManager();
        $entity = $em->getRepository($this->entity_class)->findOneBy(array(
            'url' => $url,
            'market' => $market,
        ));

        if (!is_object($entity)) {
            $bt = debug_backtrace(0,2);
            $caller = array_shift($bt);
            $entity = new \Entity\Bizj\UrlShortener();
            $entity
                ->setUrl($url)
                ->setMarket($market)
                ->setSource($caller['file'] . ':' . $caller['line'])
                ->setCreatedTime(new \DateTime());

            $em->persist($entity);
            $em->flush();
        }

        return self::HOST . $this->toBase($entity->getUrlId());
    }
}
