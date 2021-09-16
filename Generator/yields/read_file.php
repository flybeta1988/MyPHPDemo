<?php
function getLines($file) {
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            echo microtime(1). " ".__METHOD__. " -> get line\n";
            yield $line;
            sleep(1);
        }
    } finally {
        fclose($f);
    }
}

$lines = getLines("chars.txt");
var_dump($lines);

foreach ($lines as $n => $line) {
    echo $n. ':'. $line;
}
