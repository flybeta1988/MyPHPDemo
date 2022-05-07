<?php
namespace DesignPatterns\ACreational\AbstractFactory;

interface IJsonWriter
{
    public function write(array $data, bool $formatted): string;
}