<?php

/**
 * 分割字符串 
 * @param String $str  要分割的字符串 
 * @param int $length  指定的长度 
 * @param String $end  在分割后的字符串块追加的内容 
 */
function mb_chunk_split($string, $length, $end, $once = false){
    //$string = iconv('gb2312', 'utf-8//ignore', $string);
    $array = array();
    $strlen = mb_strlen($string);
    while($strlen){
        $array[] = mb_substr($string, 0, $length, "utf-8");
        if ($once) {
            return $array[0] . $end;
        }
        $string = mb_substr($string, $length, $strlen, "utf-8");
        $strlen = mb_strlen($string);
    }
    return implode($end, $array);
}

$str = "非洲有句谚语：“河有源泉水才深。”中非友好交往源远流长。上世纪五六十年代，毛泽东、周恩来等新中国第一代领导人和非洲老一辈政治家共同开启了中非关系新纪元。从那时起，中非人民在反殖反帝、争取民族独立和解放的斗争中，在发展振兴的道路上，相互支持、真诚合作，结下了同呼吸、共命运、心连心的兄弟情谊。";

$chunk_str = mb_chunk_split($str, 2, '#');
$str_list = explode('#', $chunk_str);
$rand = array_rand($str_list, 2);
$pick = array(
    $str_list[$rand[0]],
    $str_list[$rand[1]],
);
$r = join('', $pick);
echo($r. "\r\n");die();