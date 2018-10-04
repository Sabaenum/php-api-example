<?php
namespace api;
use api\routes\Route;
use api\responses\Response;
use api\responses\Request;
use api\src\fetchClass;

class Boot {
    public $route;
    public $request;
    public $response;
    public function __construct()
    {
    $this->route =  new Route();
    $this->request = new Request();
    $this->response = new Response();
    }
    public function run(){
        if(!$this->request->getMethod()){
            $this->response->errorMassage(array('code' => -1, 'massage' => 'Internal Error','details' => 'Please try again later'), 400);
        }
        else {
            $fetch = new fetchClass();
            $result = $fetch->getAll($this->route->getUri(), $this->request->getParametrs());
            if ($result !== false) {
                $this->response->setMassage($result);
            }else{
                $this->response->errorMassage(array('code' => 2, 'massage' => 'Not Found', 'details' => 'Entity (or table) not found'), 400);
            }
        }
        $this->response->send();
    }
}

