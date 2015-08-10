<?php

namespace App\Repositories;

use App\User;

interface ApplicationRepository {

    /**
     * Create's an application form.
     *
     * @param User $user
     * @param array $attributes
     * @return mixed
     */
    public function create(User $user, $attributes = array());

    /**
     * Get all of the applications submitted by a specific user.
     *
     * @param User $user
     * @return mixed
     */
    public function getAll(User $user);

    /**
     * Update an application form.
     *
     * @param array $attributes
     * @return mixed
     */
    public function update($attributes = array());

}