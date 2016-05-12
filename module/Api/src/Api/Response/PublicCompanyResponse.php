<?php

namespace Api\Response;

/**
 * Class PublicCompanyResponse
 * @package Api\Response
 */
class PublicCompanyResponse extends ResponseAbstract {

    /**
     * @var \stdClass
     */
    public $body;

    /**
     * @var string
     */
    public $message;

    /**
     * @var bool
     */
    public $success;

    /**
     * PublicCompanyResponse constructor.
     */
    public function __construct () {
        $this->body = new \stdClass();
        $this->message = "";
        $this->success = false;
    }

    /**
     * @return array
     */
    public function toArray () {
        return [
            'body' => $this->body,
            'message' => $this->message,
            'success' => $this->success,
        ];
    }
}
