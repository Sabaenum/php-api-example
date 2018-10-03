<?php
namespace api;
use api\routes\Route;
use api\responses\Response;
use api\src\fetchClass;

class Boot {
    public $route;
    public function __construct()
    {
    $this->route =  new Route();
    }
    public function run(){
        $response = new Response();
//        if(!$this->route->request->method){
//            return $response->errorMassage('NOT ALLOWED METHOD', 400);
//        };
        $res = new fetchClass();

        return $res->getAll('Persons');
    }
}

