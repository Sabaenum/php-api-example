<?php
namespace api\interfaces;

interface RequestInterface{
    public function getMethod();
    public function getParametrs();
}