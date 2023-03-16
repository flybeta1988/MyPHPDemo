<?php

global $g;

function f11($a) {
    global $g;
    var_dump($g);
    echo __METHOD__. "\n";
    $traces = debug_backtrace();
    //print_r($traces);
}

function f1($a) {
    f11($a);
    echo __METHOD__. "\n";
}

function foo() {
    $g = 'aaa';
    f1(111);    
}

foo();