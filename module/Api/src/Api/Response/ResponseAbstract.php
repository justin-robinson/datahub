<?php

namespace Api\Response;

/**
 * Class ResponseAbstract
 * @package Api\Response
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
