<?php
namespace App\Libs;

use App\Exceptions\ActionException;

class Uploader
{
    private $formFileName;

    private $targetDir = __DIR__. "/../../public/images/thumbs/";

    public function __construct($formFileName)
    {
        $this->formFileName = $formFileName;
    }

    public function getFile() {

        $origin_file = $_FILES[$this->formFileName]['name'] ?? '';
        $tmp_file = $_FILES[$this->formFileName]['tmp_name'] ?? '';
        $upload_error = $_FILES[$this->formFileName]['error'] ?? -1;
        Log::info(__METHOD__. "upload detail:". var_export($_FILES, true));

        if (UPLOAD_ERR_OK != $upload_error) {
            throw new ActionException("文件传到服务器临时目录失败，errcode:{$upload_error}", 1);
        }

        $thumb = $_REQUEST['thumb'] ?? '';
        if ($thumb && !$tmp_file) {
            return $thumb;
        }

        if (!$tmp_file) {
            throw new ActionException("缩图不能为空", 1);
        }

        if (!is_uploaded_file($tmp_file)) {
            throw new ActionException("不是合法的上传文件", 1);
        }

        $file_ext = substr($origin_file, strrpos($origin_file, '.') + 1);
        $filename = date("YmdHis"). '_'. mt_rand(1000, 9999). '.'. $file_ext;
        $filepath = $this->targetDir. $filename;

        if (!(move_uploaded_file($tmp_file, $filepath))) {
            Log::warning(__METHOD__. " 上传文件失败， tmp_file:{$tmp_file} filepath:{$filepath}");
            throw new ActionException("上传文件失败，filepath:{$filepath}", 1);
        }

        return $filename;
    }
}