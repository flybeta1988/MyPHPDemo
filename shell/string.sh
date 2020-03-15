#!/usr/bin/env bash

a="abc";
b="abcd"
if [ $a = $b ]
then
    echo "$a = $b : a 等于 b"
else
    echo "$a = $b : a 不等于 b"
fi

if [ $a != $b ]
then
    echo "$a != $b : a 不等于 b"
else
    echo "$a != $b : a 等于 b"
fi

if [ -z $a ]
then
    echo "-z $a : 字符串长度为 0"
else
    echo "-z $a : 字符串长度不为 0"
fi
