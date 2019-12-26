<?php

$nums = range(1, 60);

foreach ($nums as $n) {
    echo $n. '. <div><img src="http://1.xnwimg.com/emoj/'. $n. '.png" /><img src="http://1.xnwimg.com/emoj/'. $n. '.gif" /></div>';
}