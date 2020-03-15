#!/usr/bin/env bash

echo "hello world!"

age=28
user_name="TianHuan"
echo "hello ${user_name}" "age:${age}"

#readonly user_name

user_name="flybeta"

#unset user_name

echo "hello $user_name"

#获取字符串长度
echo ${#user_name}
echo `expr length : "$user_name"`

#提取子字符串
string="PHP is the best computer language!"
echo ${string:0:5}

#查找子字符串
#echo `expr index : "$string" t`
