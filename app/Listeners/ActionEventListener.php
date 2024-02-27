<?php

namespace App\Listeners;

use App\Events\Action_store;
use App\Models\Action_stats;
use DeviceDetector\Parser\Client\Browser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActionEventListener
{
    public function __construct()
    {
        //
    }

    public function handle(Action_store $event): void
    {
        Action_stats::insert([
            'user' => $event->user->name,
            'user_ip' =>$event->user_ip,
            'browser_used' => $event->browser,
            'user_id' => $event->user->id,
            'action' => $event->action,
            'table_changed' => $event->table_changed,
            'data_changed' => now(),
            'environment' => $event->environment,
            'data_id' => $event->data->id
        ]);
    }
}
