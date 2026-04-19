<?php

namespace App\Events;

use App\Models\Workspace;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class CallStatusChanged implements ShouldBroadcastNow
{
    use SerializesModels;

    public $workspaceId;
    public $callActive;

    public function __construct(Workspace $workspace)
    {
        $this->workspaceId = $workspace->id;
        $this->callActive = $workspace->call_active;
    }

    public function broadcastOn()
    {
        return new Channel('workspace.' . $this->workspaceId);
    }

    public function broadcastAs()
    {
        return 'call.status.changed';
    }
}
