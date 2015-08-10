<?php

namespace App\Listeners\User;

use App\Events\User\EmailUpdatedEvent;
use App\Jobs\User\SendVerificationEmail;
use App\Models\Auth\EmailVerification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Bus;

class EmailUpdatedListener
{
    /**
     * Handle the event.
     *
     * @param  EmailUpdatedEvent  $event
     * @return void
     */
    public function handle(EmailUpdatedEvent $event)
    {
        EmailVerification::create(["user_id" => $event->user()->id]);

        $user = $event->user();
        $user->verified = false;
        $user->save();

        Bus::dispatch(new SendVerificationEmail($user));
    }
}
