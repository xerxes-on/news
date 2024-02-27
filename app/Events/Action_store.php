<?php

namespace App\Events;

use Browser;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Action_store
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $action;
    public $data;
    public $user_ip;
    public $browser;
    public $table_changed;
    public $environment;
    public function __construct($data, $action,$user, $ip, $table_changed)
    {
        $this->user = $user;
        $this->action = $action;
        $this->data = $data;
        $this->user_ip = $ip;
        $this->browser = Browser::browserFamily();
        $this->table_changed = $table_changed;
        $this->environment = Browser::deviceFamily();
    }
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
