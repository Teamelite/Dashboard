<?php

namespace App\Listeners\User;

use App\Events\User\ApplicationSubmittedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationSubmittedListener
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
     * @param  ApplicationSubmittedEvent  $event
     * @return void
     */
    public function handle(ApplicationSubmittedEvent $event)
    {
        //
    }
}
