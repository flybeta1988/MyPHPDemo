<?php
namespace DesignPatterns\ACreational\AbstractFactory;

class UnixCsvWriter implements ICsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\n";
    }
}