<?php

namespace App\Listeners;

use App\Events\HomeEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HomeEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  HomeEvents  $event
     * @return void
     */
    public function handle(HomeEvents $event)
    {
        info('Estrou no hoem');
        info($event->text);
    }
}
