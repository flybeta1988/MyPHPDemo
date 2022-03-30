<?php
namespace Bin\UpdateLendRecodeStatus;

use App\Libs\Log;
use App\Models\LendRecord;
use Bin\ScriptBase;

include_once "ScriptBase.php";

class UpdateLendRecodeStatus extends ScriptBase {
    protected function run() {
        if (!($records = LendRecord::getUnReturnList())) {
            exit("No data!");
        }
        $num = 0;
        foreach ($records as $record) {
            $lendRecord = LendRecord::toEntity($record);
            $lendRecord->status = LendRecord::STATUS_EXPIRED;
            if ($lendRecord->save()) {
                $num ++;
            }
        }
        Log::info("UpdateLendRecodeStatus ok, update num:{$num}!");
    }
}

new UpdateLendRecodeStatus();
