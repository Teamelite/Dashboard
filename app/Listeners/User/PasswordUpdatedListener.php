<?php

namespace App\Listeners\User;

use App\Events\User\PasswordUpdatedEvent;
use App\Jobs\User\SendPasswordUpdateEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Bus;

class PasswordUpdatedListener
{
    /**
     * Handle the event.
     *
     * @param  PasswordUpdatedEvent  $event
     * @return void
     */
    public function handle(PasswordUpdatedEvent $event)
    {
        if (!$event->internal()) {
            Bus::dispatch(new SendPasswordUpdateEmail($event->user()));
        }
    }
}
