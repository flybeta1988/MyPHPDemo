<?php
namespace DesignPatterns\ACreational\AbstractFactory;

class WinJsonWriter implements IJsonWriter
{
    public function write(array $data, bool $formatted): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}