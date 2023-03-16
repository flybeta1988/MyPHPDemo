<?php
namespace DesignPatterns\ACreational\StaticFactory\Xnw;

use PHPUnit\Framework\TestCase;

include_once("../../../autoload.php");

class Test extends TestCase
{
    public function testCanMakeLiveCourse() {
        $this->assertInstanceOf(LiveCourse::class, CourseFactory::make(1));
    }

    public function testCanMakeRecordCourse() {
        $this->assertInstanceOf(RecordCourse::class, CourseFactory::make(2));
    }

    public function testException() {
        $this->expectException(\Exception::class);
        CourseFactory::make(3);
    }
}