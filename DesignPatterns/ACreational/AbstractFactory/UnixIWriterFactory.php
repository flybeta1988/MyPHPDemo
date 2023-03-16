<?php
namespace DesignPatterns\ACreational\AbstractFactory;

class UnixIWriterFactory implements IWriterFactory
{
    public function createCsvWriter(): ICsvWriter
    {
        return new UnixCsvWriter();
    }

    public function createJsonWriter(): IJsonWriter
    {
        return new UnixJsonWriter();
    }
}