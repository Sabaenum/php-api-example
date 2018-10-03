<?php

namespace api\responses;

use api\interfaces\RequestInterface;

Class Request implements RequestInterface {

    public $parrams;
    public $method;

    public function __construct()
    {
        $this->method = $this->getMethod();
        $this->parrams = $this->getParametrs();
    }

    public function getMethod(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'POST' :
                return 'POST';
                break;
            default:
                return false;
        }
    }
    public function getParametrs(){
        return json_encode($_POST);
    }
}