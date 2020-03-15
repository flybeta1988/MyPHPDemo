#!/usr/bin/env bash

echo "执行的脚本文件名：$0"
echo "第1个参数：$1"
echo "第2个参数：$2"
echo "第3个参数：$3"
echo "传递到脚本的参数个数(\$#)：$#"
echo "以一个单字符串显示所有向脚本传递的参数(\$*)：$*"
echo "脚本运行的当前进程ID号(\$$)：$$"
echo "后台运行的最后一个进程的ID号(\$!)：$!" #@todo mac下获取不到
echo "与\$*相同，但是使用时加引号，并在引号中返回每个参数(\$@)：$@"
echo "显示Shell使用的当前选项(\$-)：$-"
echo "显示最后命令的退出状态(\$?)：$?"

echo "---- \$* ----"
for i in "$*"; do
    echo $i
done

echo "---- \$@ ----"
for i in "$@"; do
    echo $i
done