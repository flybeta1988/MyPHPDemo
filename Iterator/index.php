<?php

require_once './MyIterator.php';

$myIterator = new MyIterator([1, 2, 3]);

foreach ($myIterator as $key => $mi) {
    print "=========================> {$key}: {$mi}\n\n";
}
