#!/bin/bash

z=`expr $1 + $2`
echo "两数之和：$z"

z=`expr $1 - $2`
echo "两数之差：$z"

z=`expr $1 \* $2`
echo "两数之积：$z"

z=`expr $1 / $2`
echo "两数之商：$z"

z=`expr $1 % $2`
echo "两数之余：$z"

if [ 'a' == 'a' ]
then
    echo "eq"
else
    echo "no eq"
fi

echo `expr length : "this is a test"`

if [ 1 -lt 2 -a 3 -gt 5 ]
then
    echo "或运算true"
else
    echo "或运算false"
fi