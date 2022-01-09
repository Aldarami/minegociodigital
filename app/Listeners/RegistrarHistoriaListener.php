<?php

namespace App\Listeners;

use App\Events\HistoriaEvent;
use App\Models\Historia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegistrarHistoriaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\HistoriaEvent  $event
     * @return void
     */
    public function handle(HistoriaEvent $event)
    {
        $datos = $event->datos;
        $historia = Historia::create( $datos );
    }
}
