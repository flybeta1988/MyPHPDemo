#!/usr/bin/env bash

#set -x
#who |grep $1

#name=$1?$1:"Shell";
if [ "$1" ]
then
	name=$1
else
	name='Shell';
fi
str="Hello ${name}!";
echo $str;

echo "${str}'s len is: ${#str}";

string="runoob is a great site"
echo `expr index "$string" io`  # 输出 4
