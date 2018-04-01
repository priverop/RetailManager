<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MaterialParteModificado
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $material_id;
    public $parte_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($material_id, $parte_id)
    {
        $this->material_id = $material_id;
        $this->parte_id = $parte_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
