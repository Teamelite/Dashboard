<?php

namespace App\Repositories\Contracts;

use App\Events\User\ApplicationSubmittedEvent;
use App\Models\Application;
use App\Repositories\ApplicationRepository;
use App\User;
use Illuminate\Support\Facades\Event;

class ApplicationRepositoryContract implements ApplicationRepository {

    /**
     * Create's an application form.
     *
     * @param User $user
     * @param array $attributes
     * @return mixed
     */
    public function create(User $user, $attributes = array())
    {
        array_set($attributes, 'user_id', $user->id);

        $application = Application::create($attributes);

        Event::fire(new ApplicationSubmittedEvent($application));

        return $application;
    }

    /**
     * Get all of the applications submitted by a specific user.
     *
     * @param User $user
     * @return mixed
     */
    public function getAll(User $user)
    {
        return Application::where('user_id', $user->id)->get();
    }

    /**
     * Update an application form.
     *
     * @param array $attributes
     * @return mixed
     */
    public function update($attributes = array())
    {
        Application::where('id', $attributes['id'])->first()->update($attributes);
    }
}