<?php
namespace DesignPatterns\ACreational\StaticFactory\Xnw;

final class CourseFactory
{
    public static function make(int $type): ICourse
    {
        switch ($type) {
            case 1:
                return new LiveCourse();
            case 2:
                return new RecordCourse();
            default:
                throw new \Exception('invalid type');
        }
    }
}