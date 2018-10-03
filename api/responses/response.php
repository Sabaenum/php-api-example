<?php

namespace api\responses;
use api\interfaces\ResponseInterface;

Class Response implements ResponseInterface{
    private $code;
    private $message;
    public function jsonDecode()
    {

    }

    public function errorMassage($message = '',$code = 404)
    {
       return $message;
    }
}