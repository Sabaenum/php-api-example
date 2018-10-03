<?php
namespace api\interfaces;

interface ResponseInterface
{
    public function jsonDecode();
    public function errorMassage();
}