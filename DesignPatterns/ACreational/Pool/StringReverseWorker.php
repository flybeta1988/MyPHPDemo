<?php
namespace DesignPatterns\ACreational\Pool;

class StringReverseWorker
{
    public function __construct()
    {

    }

    public function run(string $str): string
    {
        return strrev($str);
    }
}