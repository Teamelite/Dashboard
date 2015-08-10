<?php


namespace App\Repositories;


use App\User;

interface UserRepository {

    /**
     * Create a new User.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = array());

    /**
     * Verify a user's email address.
     *
     * @param $token
     * @return mixed
     */
    public function verify($token);

    /**
     * Send the user a reset link.
     *
     * @param $email
     * @return mixed
     */
    public function forgotPassword($email);

    /**
     * Reset the user's password.
     *
     * @param $token
     * @return mixed
     */
    public function resetPassword($token);

    /**
     * Change the user's password.
     *
     * @param User $user
     * @param $password
     * @return mixed
     */
    public function changePassword(User $user, $password);

    /**
     * Create a request to change the user's email address.
     *
     * @param User $user
     * @param $email
     * @return mixed
     */
    public function changeEmailRequest(User $user, $email);

    /**
     * Confirm's the user's email change request.
     *
     * @param $token
     * @return mixed
     */
    public function changeEmailConfirm($token);

    /**
     * Update a user's
     *
     * @param User $user
     * @param array $attributes
     * @return mixed
     */
    public function update(User $user, $attributes = array());

    /**
     * Associate a user with their minecraft profile.
     *
     * @param User $user
     * @param $token
     * @return mixed
     */
    public function associateMinecraft(User $user, $token);

}