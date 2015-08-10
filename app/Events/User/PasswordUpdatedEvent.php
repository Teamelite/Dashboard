<?php

namespace App\Events\User;

use App\Events\Event;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PasswordUpdatedEvent extends Event
{
    use SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $internal;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param bool $internal
     */
    public function __construct(User $user, $internal = false)
    {
        $this->user = $user;
        $this->internal = $internal;
    }

    /**
     * @return User
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * @return bool
     */
    public function internal()
    {
        return $this->internal;
    }

}
