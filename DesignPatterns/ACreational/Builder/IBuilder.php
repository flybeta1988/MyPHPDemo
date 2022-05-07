<?php
namespace DesignPatterns\ACreational\Builder;

use DesignPatterns\ACreational\Builder\Parts\Vehicle;

interface IBuilder
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle(): Vehicle;
}