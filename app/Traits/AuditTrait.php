<?php

namespace App\Traits;

use App\Models\Audit;

Trait AuditTrait
{
    public function logChanges($log, $action, $user_id)
    {
        $audit = new Audit;
        $audit->log = $log;
        $audit->action = $action;
        $audit->user_id = $user_id;
        $audit->save();
    }
}