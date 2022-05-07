<?php
namespace DesignPatterns\ACreational\AbstractFactory;

include_once("../../autoload.php");

class AbstractFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function provideFactory()
    {
        return [
            [new UnixIWriterFactory()],
            [new WinWriterFactory()]
        ];
    }

    /**
     * @dataProvider provideFactory
     */
    public function testCanCreateCsvWriterOnUnix(IWriterFactory $writerFactory)
    {
        $this->assertInstanceOf(IJsonWriter::class, $writerFactory->createJsonWriter());
        $this->assertInstanceOf(ICsvWriter::class, $writerFactory->createCsvWriter());
    }
}