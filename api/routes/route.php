<?php
namespace api\routes;

use api\interfaces\UrlInterface;

Class Route implements UrlInterface{

    public $uri;
    public $basePath;

    public function __construct()
    {
        $this->uri = $this->getUri();
        $this->basePath = $this->getBasePath();
    }

    public function getUri()
    {
        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($this->getBasePath()));

        if (strstr($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        }

        return trim($this->uri, '/');
    }

    public function getBasePath()
    {
        if ($this->basePath === null) {
            $this->basePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)).'/';
        }
        return $this->basePath;
    }
}