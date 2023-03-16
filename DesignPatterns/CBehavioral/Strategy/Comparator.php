<?php
namespace DesignPatterns\CBehavioral\Strategy;

interface Comparator
{
    public function compare($a, $b): int;
}