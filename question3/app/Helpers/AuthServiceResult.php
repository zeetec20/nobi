<?php

namespace App\Helper;

class UserServiceResult {

    /**
     * @var bool $succes
     */
    public $success;

    /**
     * @var string? $message
     */
    public $message;

    /**
     * @var string? $data
     */
    public $data;

    /**
     * @param bool $success
     * @param string? $message
     * @param $data?
     */
    public function __construct($success, $message = null, $data = null) {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }
}
