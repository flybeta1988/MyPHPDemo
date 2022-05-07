<?php
namespace DesignPatterns\ACreational\Builder;

use DesignPatterns\ACreational\Builder\Parts\Car;
use DesignPatterns\ACreational\Builder\Parts\Door;
use DesignPatterns\ACreational\Builder\Parts\Engine;
use DesignPatterns\ACreational\Builder\Parts\Vehicle;
use DesignPatterns\ACreational\Builder\Parts\Wheel;

class CarBuilder implements IBuilder
{
    private Car $car;

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function addWheel()
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }

    public function addEngine()
    {
        $this->car->setPart('carEngine', new Engine());
    }

    public function addDoors()
    {
        $this->car->setPart('leftDoor', new Door());
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('trunkLid', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->car;
    }
}