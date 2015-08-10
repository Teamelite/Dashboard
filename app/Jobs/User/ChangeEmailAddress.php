<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Models\User\EmailChangeRequest;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Bus;

class ChangeEmailAddress extends Job implements SelfHandling
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
     * @param $email
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
        $this->user->email = $this->email;
        $this->user->verified = false;
        $this->user->save();

        foreach ($this->user->emailChangeRequest() as $request) {
            $request->token = null;
            $request->save();
        }
    }
}
