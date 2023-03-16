<?php
namespace DesignPatterns\ACreational\AbstractFactory;

interface IWriterFactory
{
    public function createCsvWriter(): ICsvWriter;
    public function createJsonWriter(): IJsonWriter;
}