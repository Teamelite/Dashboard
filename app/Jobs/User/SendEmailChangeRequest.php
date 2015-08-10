<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Models\User\EmailChangeRequest;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;

class SendEmailChangeRequest extends Job implements SelfHandling
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var String
     */
    private $email;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user, $email)
    {
        $this->user = $user;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = EmailChangeRequest::create([
            "user_id" => $this->user->id,
            "email" => $this->user->email,
            "new_email" => $this->email,
        ]);

        // Mail user
        Mail::queue('user.emails.update.email', ["user" => $this->user, "token" => $request->token], function ($message) {
            $message->to($this->user->email);
            $message->subject('Email change request.');
        });
    }
}
