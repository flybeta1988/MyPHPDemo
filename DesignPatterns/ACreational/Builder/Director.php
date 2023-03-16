<?php
namespace DesignPatterns\ACreational\Builder;

use DesignPatterns\ACreational\Builder\Parts\Vehicle;

class Director
{
    public function build(IBuilder $builder): Vehicle
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();
        return $builder->getVehicle();
    }
}