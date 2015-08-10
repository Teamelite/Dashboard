<?php

namespace App\Jobs\Auth;

use App\Jobs\Job;
use App\Models\Auth\PasswordReset;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;

class SendForgotPassword extends Job implements SelfHandling
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
        $reset = PasswordReset::create(["user_id" => $this->user->id]);

        if ($reset) {
            // Mail user
            Mail::queue('auth.emails.forgot', ["user" => $this->user, "token" => $reset->token], function ($message) {
                $message->to($this->user->email);
                $message->subject('Password reset.');
            });
        }
    }
}
