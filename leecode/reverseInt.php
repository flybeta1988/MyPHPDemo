<?php
function reverseInt($nums) :int {
    $str = (string)$nums;
    $size = strlen($str);
    for($i = $size-1; $i >= 0; $i--) {
        echo $str[$i];
    }
    return $nums;
}

function reverseIntV2($x) :int {
    $y = 0;
    while($x != 0) {
        $y = $y * 10 + $x % 10;
        if (!(-1 << 31 <= $y && $y <= (1 << 31 - 1))) {
            return 0;
        }
        $x /= 10;
        $x = (int)$x;
    }
    return $y;
}

echo reverseIntV2(123456);
