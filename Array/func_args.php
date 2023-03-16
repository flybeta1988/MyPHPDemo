<?php

//可变参数
//5.6之前的写法
function foo() {
    $args = func_get_args();
    print_r($args);
    $arg = func_get_arg(2);
    var_dump($arg);
}

//foo(1, 2, 3, 4);


//可变参数
//5.6之后的写法
function foo2(...$args) {
    print_r($args);
}
foo2(1, 2, 3, 4, 5, 6, 7);