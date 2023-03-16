<?php

try {
    throw new Exception('111', 100);
} catch (Exception $e) {
    print "catch exception: ". $e->getMessage() ."\n";
    //var_dump($e);
} finally {
    print "this is finally!\n";
}