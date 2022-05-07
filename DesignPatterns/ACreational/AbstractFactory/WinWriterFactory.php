<?php
namespace DesignPatterns\ACreational\AbstractFactory;

class WinWriterFactory implements IWriterFactory
{
    public function createCsvWriter(): ICsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): IJsonWriter
    {
        return new WinJsonWriter();
    }
}