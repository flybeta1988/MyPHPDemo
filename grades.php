<?php


$grade_str = '不限,五年级,四年级,六年级,三年级,高三,初三,二年级,科技艺术不限,一年级,初二,高二,初一年级,其他,九年级,初二年级,初一,艺术体育不限,八年级,高一,七年级,初三年级,级,中预,大班,初四,中班,五、六年级,高一年级,高二年级,国内夏令营,小班,高三年级,学前班,1,小小班,国内冬令营,中,初中一年级,初中二年级,大,初中,小,初中三年级,高二2部,16春季招生,大二,2014,14级技术,2015,秋季,春季,七,6,7年级,14级汽检,英语,数学,大四,高中三年级,剑桥,2015级,大一,7,15级会计,15级汽检,9年级,一,高中二年级,14级电商,科技社团,大三,8年级,中级部,14级营销,新概念,13级电子商务,13级汽检,15级营销,8,二,15级电商,幼儿,八,2014级,高中一年级,大五,级大班,小级部,4,15级计网,2,5,13级建筑工程技术,大级部,13级计网,四年,3,五年,八年,公寓管理,幼儿园,15级造价,初中不限,美术兴趣班,15级技术,14级计网,九年,13级营销,大赵幼儿园,级应电,汽修系,14级软件,2012年级,2013,15级交通运营管理,六,13级管理,2013年级,14级物流,研三,一年,13级应电1班,2012,六年,15级装饰,15级物流,2011年级,13级物流,13供电1班,级中班,2011,15级广告,研一,14级管理,15级软件,测试,九,足球社团,13级广告,正统心算,13级模具,13级汽运,启智珠心算,级小班,电气自动化,14级汽电,01,研二,13级软件技术,15级管理,2015年级,14级模具,13级汽电,13级技术,13级电气,14级交通运营,初中一年,6年级,2014年级,化学,四,15级药管1班,航头中学五四班,Hsh,kpo,13级环监,15级会展,14级电气化,小学五年级,15级模具,2年,G2014,航模四年级,小学六年级,14级人物,14级汽运,天津升学,14级电气,光辉,nnnm,15级电商7班,15级动漫,擦擦擦,物理,15级人物,系公寓办主任,小小一班,09,13级新闻,2018级,学前小班,机械系,淄博商厦,级供电,幼儿园大班,基础教育系,高1,13级制药,14级动漫,五,13级图文辅导员,13级交通运营,小山哈畲歌社团,科技,13级会展1班,15级空乘,14级制冷,三十,14级新闻,15级汽电1班,全校教师群,14级药管,1年级,小学三年,15级生物技术1班,15级图文,15级电气化,8.16,三,14级会展1班,15级新闻,14级交通控制,学前大班,13级焊接,中二,2016,高中理科补习,22,14级广告,人家,高中2015,高2,13级药管,初中二级级,哈哈ha,13级铁道技术,象棋社团,机器人,15级音乐,儿童画,San,二年,通用1,13级人物,15级汽检9班,小学部全体教师,14级药剂,过后,数控系,七年级三班,9,跆拳道社团,小2班,一年假,14级装饰,15级焊接,14级摄影,15级汽运,4年级,我哦,高3,14级制药,13级动漫,98,2010级,15级物流4班,15级交通控制,黄黄,15级摄影,14级焊接,少儿画,中三,三年,16级,13级摄影,13级制冷,中学部全体教师';

$grade_list = explode(',', $grade_str);

//echo count($grade_list);

function getGradeIntByStr($grade_str){
    $grade_dict = array(
        '一年级' => 1,
        '二年级' => 2,
        '三年级' => 3,
        '四年级' => 4,
        '五年级' => 5,
        '六年级' => 6,
        '七年级' => 7,
        '八年级' => 8,
        '九年级' => 9,
        '一年' => 1,
        '二年' => 2,
        '三年' => 3,
        '四年' => 4,
        '五年' => 5,
        '六年' => 6,
        '七年' => 7,
        '八年' => 8,
        '九年' => 9,
        '一' => 1,
        '二' => 2,
        '三' => 3,
        '四' => 4,
        '五' => 5,
        '六' => 6,
        '七' => 7,
        '八' => 8,
        '九' => 9,
        '1年级' => 1,
        '2年级' => 2,
        '3年级' => 3,
        '4年级' => 4,
        '5年级' => 5,
        '6年级' => 6,
        '7年级' => 7,
        '8年级' => 8,
        '9年级' => 9,
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '初一' => 7,
        '初二' => 8,
        '初三' => 9,
        '初1' => 7,
        '初2' => 8,
        '初3' => 9,
        '高一' => 10,
        '高二' => 11,
        '高三' => 12,
        '高1' => 10,
        '高2' => 11,
        '高3' => 12,
    );
    return isset($grade_dict[$grade_str]) ? $grade_dict[$grade_str] : '';
}

function getGradeIntByKeyword($grade_keyword){

    if (($grade_id = getGradeIntByStr($grade_keyword))) {
        return $grade_id;
    }

    $segments = array(
        '小学' => array(
            '一' => 1,
            '二' => 2,
            '三' => 3,
            '四' => 4,
            '五' => 5,
            '六' => 6,
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
        ),
        '初' => array(
            '一' => 7,
            '二' => 8,
            '三' => 9,
            '1' => 7,
            '2' => 8,
            '3' => 9,
        ),
        '高'=> array(
            '一' => 10,
            '二' => 11,
            '三' => 12,
            '1' => 10,
            '2' => 11,
            '3' => 12,
        ),
    );

    foreach ($segments as $key => $segment) {
        if (false !== strpos($grade_keyword, $key)) {
            foreach ($segment as $k => $grade) {
                if (false !== strpos($grade_keyword, $k)) {
                    return $segment[$k];
                }
            }
        }
    }
    return 0;
}

foreach ($grade_list as $grade) {
    $grade_id = getGradeIntByKeyword($grade);
    echo "{$grade} -> {$grade_id} \n";
}