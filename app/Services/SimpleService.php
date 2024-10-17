<?php

namespace App\Services;

class SimpleService
{
    public function log(String $string)
    {
        logger($string);
    }
}