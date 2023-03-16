#!/usr/bin/env bash

function foo() {
    echo "hello function"
}

function get_return() {
    return `expr $1 + $2`
}

foo

get_return 1 2
echo "函数返回结果是：$?"