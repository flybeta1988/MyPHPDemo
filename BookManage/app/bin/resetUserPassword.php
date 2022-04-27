<?php
namespace Bin\UpdateLendRecodeStatus;

use App\Libs\Log;
use App\Models\User;
use Bin\ScriptBase;

include_once "ScriptBase.php";

class ResetUserPassword extends ScriptBase {
    protected function run() {
        if (!($users = User::getList())) {
            exit("No data!");
        }
        $num = 0;
        foreach ($users as $user) {
            $user = User::toEntity($user);
            $user->password = md5('123456');
            if ($user->save()) {
                $num ++;
            }
        }
        Log::info("resetUserPassword ok, update num:{$num}!");
    }
}

new ResetUserPassword();
