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

    /**
     * 下划线转驼峰
     * 思路:
     * step1.原字符串转小写,原字符串中的分隔符用空格替换,在字符串开头加上分隔符
     * step2.将字符串中每个单词的首字母转换为大写,再去空格,去字符串首部附加的分隔符.
     */
    public static function camelize($uncamelized_words,$separator='_') {
        $uncamelized_words = $separator. str_replace($separator, " ", strtolower($uncamelized_words));
        return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator );
    }

    /**
     * 驼峰命名转下划线命名
     * 思路:
     * 小写和大写紧挨一起的地方,加上分隔符,然后全部转小写
     */
    public static function uncamelize($camelCaps,$separator='_') {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
    }

    public static function varsToArray($obj) {
        return self::processArray2(get_object_vars($obj));
    }

    private static function processArray2($array) {
        $rows = [];
        foreach($array as $key => $value) {
            $key = Util::uncamelize($key);
            if (is_object($value)) {
                $rows[$key] = self::varsToArray($value);
            }
            if (is_array($value)) {
                $rows[$key] = self::processArray2($value);
            }
            $rows[$key] = $value;
            unset($array[$key]);
        }
        return $rows;
    }

    public static function post($url, $parameters = [], $header = [], $referer = '') {
        return self::request($url, 'post', $parameters, $header, $referer);
    }

    public static function get($url, $header = [], $referer = '') {
        return self::request($url, 'get', [], $header, $referer);
    }

    public static function request($url, $method, $parameters = [], $header = [], $referer = '') {
        $ch = curl_init();

        if (strtolower($method) == 'post') {
            curl_setopt($ch, CURLOPT_POST, true);
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        if ($parameters) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        }

        if ($referer) {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }

        $response = curl_exec($ch);

        if (false === $response) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        curl_close($ch);

        return $response;
    }

    public static function diffUrlResponse($url1, $url2) {
        if (!$url1 || !$url2) {
            return '';
        }
        $response1 = self::get($url1);
        $response2 = self::get($url2);

        $items1 = json_decode($response1, true);
        $items2 = json_decode($response2, true);

        if (!empty($items1['errcode'])) {
            var_dump($items1);die();
        }
        if (!empty($items2['errcode'])) {
            var_dump($items2);die();
        }

        $result = [];
        self::arrayDiff($items1, $items2, 0, $result);
        //echo json_encode($result);
        print_r($result);
    }

    public static function arrayDiff(array $items1, array $items2, $parent_key, &$result) {
        foreach ($items1 as $key => $item) {
            $result_key = $parent_key. '-'. $key;
            if (key_exists($key, $items2)) {
                if (is_array($item)) {
                    self::arrayDiff($item, $items2[$key], $result_key, $result);
                } else {
                    if ($item != $items2[$key]) {
                        $result[$result_key] = [$item, $items2[$key]];
                    }
                }
            } else {
                $result[$result_key] = "[{$key}] NOT FOUND!";
            }
        }
    }
}