<?php

class OrgCourseMiddle
{
    public static function getGradeRangeStr (array $org_class) {
        $suitable_type = isset($org_class['suitable_type']) ? (int)$org_class['suitable_type'] : 0;
        $grade_min = isset($org_class['suitable_min']) ? (int)$org_class['suitable_min'] : 0;
        $grade_max = isset($org_class['suitable_max']) ? (int)$org_class['suitable_max'] : 0;

        //年龄需要转换成理论年级
        if (1 == $suitable_type) {
            $grade_min = self::getGradeIntByAge($grade_min);
            $grade_max = self::getGradeIntByAge($grade_max);
        }

        if (0 === $grade_min) {
            if ((0 === $grade_max)) {
                $grade_min = 1;
                $grade_max = 12;
                $grade_list = range($grade_min, $grade_max);
            } else {
                $grade_list = range(1, $grade_max);
            }
            $grade_list[] = 99;
        } else {
            $grade_list = range($grade_min, $grade_max);
        }

        return join(' ', $grade_list);
    }

    public static function getGradeIntByAge ($age) {
        return max(0, ($age - 5));
    }
}

$org_class = array (
    'suitable_type' => 1,
    'suitable_min' => 1,
    'suitable_max' => 5,
);

$grade_range = OrgCourseMiddle::getGradeRangeStr($org_class);
echo $grade_range;