<?php
namespace DesignPatterns\ACreational\AbstractFactory;

class WinCsvWriter implements ICsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\r\n";
    }
}