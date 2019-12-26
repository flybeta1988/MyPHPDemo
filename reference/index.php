<?php

function foo(&$allow=1) {
    return false;
}

foo($allow);

var_dump($allow);
