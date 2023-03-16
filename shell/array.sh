#!/usr/bin/env bash

user_list=(
    'flybeta'
    'tom'
    'tianhuan'
)
#echo ${user_list[1]}
#echo ${user_list[@]}

for user in ${user_list[*]}; do
    echo $user
done

echo "数组的个数：${#user_list[*]}"
echo "数组的个数：${#user_list[@]}"