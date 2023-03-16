<?php

abstract class Duck {

    private $flyBehavior;

    private $quackBehavior;

    public function __construct() {}

    public abstract function display();

    public function setFlyBehavior (FlyBehavior $fb) {
        $this->flyBehavior = $fb;
    }

    public function setQuackBehavior(QuackBehvior $qb) {
        $this->quackBehavior = $qb;
    }

    public function performFly() {
        $this->flyBehavior->fly();
    }

    public function  performQuack() {
        $this->quackBehavior->quack();
    }

    public function swim() {
        echo '所有鸭子都会游泳！';
    }
}