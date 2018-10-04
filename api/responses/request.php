<?php

namespace api\responses;

use api\interfaces\RequestInterface;

Class Request implements RequestInterface {
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
        $rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);
        return $_POST;

    }
}