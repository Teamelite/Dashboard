<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Models\Auth\EmailVerification;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmail extends Job implements SelfHandling
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
        $verification = EmailVerification::where('user_id', $this->user->id)->first();
        if ($verification)
        {
            $user = $verification->user();
            $token = $verification->token;

            // Send email
            Mail::queue('user.emails.verification', ["user" => $this->user, "token" => $token], function ($message) {
                $message->to($this->user->email);
                $message->subject('Email verification.');
            });
        }
    }
}
