<?php

class Util
{
    /**
     * @param $mix
     * @param $element
     * @return mixed|string
     */
    public static function getElement($mix, $element) {
        if (is_array($mix)) {
            return isset($mix[$element]) ? $mix[$element] : '';
        } else if (is_object($mix)) {
            return isset($mix->$element) ? $mix->$element : '';
        } else {
            return '';
        }
    }
}