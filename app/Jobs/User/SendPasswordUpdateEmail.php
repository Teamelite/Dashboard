<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;

class SendPasswordUpdateEmail extends Job implements SelfHandling
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail user
        Mail::queue('user.emails.update.password', ["user" => $this->user], function ($message) {
            $message->to($this->user->email);
            $message->subject('Your password has changed.');
        });
    }
}
