<?php

try {
    if (1/0) {
        ;
    } else {
        throw new Exception('111', 100);
    }
} catch (Exception $e) {
    print "\n catch exception: \n";
    //var_dump($e);
}