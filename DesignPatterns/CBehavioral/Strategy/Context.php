<?php
namespace DesignPatterns\CBehavioral\Strategy;

class Context
{
    private $comparator;

    public function __construct(Comparator $comparator) {
        $this->comparator = $comparator;
    }

    public function executeStrategy(array $elements): array
    {
        uasort($elements, [$this->comparator, 'compare']);
        return $elements;
    }
}