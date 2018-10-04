<?php
namespace api\interfaces;

interface ResponseInterface
{
    public function jsonEncode();
    public function errorMassage();
    public function send();
}