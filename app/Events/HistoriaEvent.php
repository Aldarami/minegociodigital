<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HistoriaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $datos;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( string $titulo, int $tipo, string $clase, int $id, string $descripcion = null )
    {
        $this->datos = [
            'titulo'    => $titulo,
            'tipo'      => $tipo,
            'historiable_type'      => $clase,
            'historiable_id'        => $id,
            'descripcion'           => $descripcion
        ];
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
