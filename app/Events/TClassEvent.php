<?php
namespace Vestibulum\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class TClassEvent
{
    use InteractsWithSockets, SerializesModels;

    public function __construct( $currentLine,  $sourceLines, $position )
    {
        $this->currentLine = $currentLine;
        $this->sourceLines = $sourceLines;
        $this->position    = $position;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
