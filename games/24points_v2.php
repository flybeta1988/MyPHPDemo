<?php

unset($argv[0]);

$target = 24;

$operators = ['+', '-', '*', '/'];

$nums1 = $nums2 = $nums3 = $nums4 = array_combine($argv, $argv);

function getResult($n1, $n2, $opt) {
    $r1 = 0;
    eval('$r1 = ($n1'. $opt. '$n2);');
    return $r1;
}

$counter = 0;
foreach ($nums1 as $n1) {
    foreach ($nums2 as $n2) {
        foreach ($operators as $opt1) {
            $r1 = getResult($n1, $n2, $opt1);

            foreach ($nums3 as $n3) {
                foreach ($operators as $opt2) {
                    $r2 = getResult($r1, $n3, $opt2);

                    foreach ($nums4 as $n4) {
                        foreach ($operators as $opt3) {
                            $r3 = getResult($r2, $n4, $opt3);

                            if ($target == $r3) {
                                $counter ++;
                                echo $counter.' ('. $n1. $opt1. $n2. ')'. $opt2. $n3. $opt3. $n4. " = {$r3}\n";
                            }
                        }
                    }
                }
            }
        }
    }
}



