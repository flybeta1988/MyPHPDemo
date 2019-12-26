<?php

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function current()
    {
        $var = current($this->var);
        echo __METHOD__. ": {$var}\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo __METHOD__. ": {$var}\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo __METHOD__. ": {$var}\n";
        return $var;
    }

    public function valid()
    {
        $var = $this->current() !== false;
        echo __METHOD__. ": {$var}\n";
        return $var;
    }

    public function rewind()
    {
        echo __METHOD__. "\n";
        reset($this->var);
    }

}
