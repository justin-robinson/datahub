<?php

namespace Api\v1\Response;

/**
 * Class ResponseAbstract
 * @package Api\v1\Response
 */
abstract class ResponseAbstract implements \JsonSerializable {

    /**
     * @return mixed
     */
    public function jsonSerialize () {
        return $this->toArray();
    }

    /**
     * @return mixed
     */
    abstract public function toArray();
}
