<?php
include_once __DIR__. '/MallardDuck.php';

$d = new MallardDuck();
$d->setQuackBehavior(new Quacks());
$d->setFlyBehavior(new FlyWithWings());

$d->display();
echo "\n";
$d->performFly();
echo "\n";
$d->performQuack();