<?php
namespace DesignPatterns\ACreational\AbstractFactory;

interface ICsvWriter
{
    public function write(array $line): string;
}