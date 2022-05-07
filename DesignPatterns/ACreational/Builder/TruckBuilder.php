<?php
namespace DesignPatterns\ACreational\Builder;

use DesignPatterns\ACreational\Builder\Parts\Door;
use DesignPatterns\ACreational\Builder\Parts\Engine;
use DesignPatterns\ACreational\Builder\Parts\Truck;
use DesignPatterns\ACreational\Builder\Parts\Vehicle;
use DesignPatterns\ACreational\Builder\Parts\Wheel;

class TruckBuilder implements IBuilder
{
    private Truck $truck;

    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function addWheel()
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
        $this->truck->setPart('wheel5', new Wheel());
        $this->truck->setPart('wheel6', new Wheel());
    }

    public function addEngine()
    {
        $this->truck->setPart('truckEngine', new Engine());
    }

    public function addDoors()
    {
        $this->truck->setPart('leftDoor', new Door());
        $this->truck->setPart('rightDoor', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->truck;
    }
}