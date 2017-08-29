<?php
//低版本、单
//低版本、多
//高版本、单
//高版本、多

//$audio = '{"audio":"{4e64e2c0-01f7-5c32-fa46-d960927ed8e2}","duration":"16915"}';
$audio = '[{"audio":"{4e64e2c0-01f7-5c32-fa46-d960927ed8e2}","duration":"16915"}]';

function _getCommentAudioList($audio_json) {
    if (!$audio_json) {
        return '';
    }

    $is_audio_list = true;
    $is_low_app = true;
    $audio_list = json_decode($audio_json, true);

    if (!_isAudioList($audio_json)) {

        $is_audio_list = false;

        if (!$is_low_app) {
            $audio_list = array(
                $audio_list
            );
        }
    }

    var_dump($is_audio_list);
    if ($is_low_app && $is_audio_list && $audio_list) {
        return isset($audio_list[0]) ? $audio_list[0] : '';
    }

    return $audio_list;
}

function _isAudioList($audio_json) {
    $audio_arr = json_decode($audio_json, true);
    if($audio_arr && is_array($audio_arr)) {
        if (!isset($audio_arr['audio'])) {
            return true;
        }
    }
    return false;
}

var_dump(_getCommentAudioList($audio));
