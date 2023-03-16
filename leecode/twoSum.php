<?php
function twoSum(array $nums, int $target): array
{
    for ($i = 0; $i < count($nums);$i++) {
        // 计算剩下的数
        $residue = $target - $nums[$i];
        // 匹配的index，有则返回index， 无则返回false
        $match_index = array_search($residue, $nums);
        if ($match_index !== false && $match_index != $i) {
            return array($i, $match_index);
        }
    }
    return [];
}

$nums = twoSum([1, 2, 5, 7], 9);
print_r($nums);