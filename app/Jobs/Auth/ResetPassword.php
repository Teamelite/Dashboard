<?php

namespace App\Jobs\Auth;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPassword extends Job implements SelfHandling
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
        $password = Str::random(8);

        $this->user->password = $password;
        $this->user->save();

        // Mail user
        Mail::queue('auth.emails.reset', ["user" => $this->user, "password" => $password], function ($message) {
            $message->to($this->user->email);
            $message->subject('New password.');
        });
    }
}
