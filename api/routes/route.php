<?php
namespace routes;

use interfaces\URL;

Class Route implements URL{

    public $uri;
    public $parametrs;
    public $method;
    public $serverBasePath;

    public function __construct()
    {

    }

    public function getUrl()
    {
        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($this->getBasePath()));

        if (strstr($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        }

        return '/'.trim($this->uri, '/');
    }

    public function getParametrs()
    {

    }

    public function getMethod()
    {

    }
    /**
     * Return server base Path, and define it if isn't defined.
     *
     * @return string
     */
    protected function getBasePath()
    {
        // Check if server base path is defined, if not define it.
        if ($this->serverBasePath === null) {
            $this->serverBasePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)).'/';
        }
        return $this->serverBasePath;
    }
}