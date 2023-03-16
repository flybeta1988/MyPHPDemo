<?php
function copyChapter() {
    yield 1;
    sleep(1);
    echo mt_rand(). " copyed!";
}

$st = microtime(1);
for ($i = 0; $i < 5; $i++) {
    copyChapter();
}
echo round(microtime(1) - $st, 4). "s\n";
