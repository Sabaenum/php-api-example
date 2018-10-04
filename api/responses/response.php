<?php

namespace api\responses;
use api\interfaces\ResponseInterface;

Class Response implements ResponseInterface{
    public $code;
    public $message;
    public function __construct()
    {
        $this->code = 200;
    }

    public function jsonEncode($result = array())
    {
        return json_encode($result);
    }

    public function errorMassage($message = array(),$code = 404)
    {
       $this->code = $code;
       $this->message = $message;
    }
    public function setMassage($message = array()){
        $this->message = $message;
    }
    public function send(){
        header('HTTP/1.1 ' . $this->code);
        print $this->jsonEncode($this->message);
    }
}