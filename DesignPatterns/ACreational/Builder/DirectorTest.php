<?php
namespace DesignPatterns\ACreational\Builder;

use DesignPatterns\ACreational\Builder\Parts\Car;
use DesignPatterns\ACreational\Builder\Parts\Truck;
use PHPUnit\Framework\TestCase;

include_once("../../autoload.php");

class DirectorTest extends TestCase
{
    public function testCanBuildTruck()
    {
        $truckBuilder = new TruckBuilder();
        $newVehicle = (new Director())->build($truckBuilder);
        $this->assertInstanceOf(Truck::class, $newVehicle);
    }

    public function testCanBuildCar()
    {
        $carBuilder = new CarBuilder();
        $newVehicle = (new Director())->build($carBuilder);
        $this->assertInstanceOf(Car::class, $newVehicle);
    }
}