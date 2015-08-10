<?php

namespace App\Repositories\Contracts;

use App\Jobs\User\ChangeEmailAddress;
use App\Jobs\User\SendEmailChangeRequest;
use App\Models\Country;
use App\Events\User\EmailUpdatedEvent;
use App\Events\User\PasswordUpdatedEvent;
use App\Jobs\Auth\ResetPassword;
use App\Jobs\Auth\SendForgotPassword;
use App\Jobs\VerifyUser;
use App\Models\Auth\EmailVerification;
use App\Models\Auth\PasswordReset;
use App\Models\Minecraft;
use App\Models\User\EmailChangeRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;

class UserRepositoryContract implements UserRepository {

    /**
     * Create a new User.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = array())
    {
        $country = Country::where('id',  array_get($attributes, 'country'));
        if ($country->exists()) {
            array_set($attributes, 'country', $country->first()->id);
            $user = User::create($attributes);

            Event::fire(new EmailUpdatedEvent($user));

            return $user;
        }
        return false;
    }

    /**
     * Verify a user's email address.
     *
     * @param $token
     * @return mixed
     */
    public function verify($token)
    {
        $verification = EmailVerification::where('token', $token);
        if ($verification->exists()) {
            $user = $verification->first()->user();
            $user->verified = true;
            $user->save();

            $verification->delete();

            return true;
        }
        return false;
    }

    /**
     * Send the user a reset link.
     *
     * @param $email
     * @return mixed
     */
    public function forgotPassword($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $reset = PasswordReset::where('user_id', $user->id);
            if ($reset->exists())
                $reset->delete();

            Bus::dispatch(new SendForgotPassword($user));

            return true;
        }
        return false;
    }

    /**
     * Reset the user's password.
     *
     * @param $token
     * @return mixed
     */
    public function resetPassword($token)
    {
        $reset = PasswordReset::where('token', $token);
        if ($reset->exists()) {
            $user = $reset->first()->user();

            Bus::dispatch(new ResetPassword($user));
            Event::fire(new PasswordUpdatedEvent($user, true));

            $reset->delete();

            return true;
        }
        return false;
    }

    /**
     * Change the user's password.
     *
     * @param User $user
     * @param $password
     * @return mixed
     */
    public function changePassword(User $user, $password)
    {
        $user->password = $password;
        $user->save();

        Event::fire(new PasswordUpdatedEvent($user, false));
    }

    /**
     * Create a request to change the user's email address.
     *
     * @param User $user
     * @param $email
     * @return mixed
     */
    public function changeEmailRequest(User $user, $email)
    {
        $reset = EmailChangeRequest::where('user_id', $user->id);
        if ($reset->exists()) {
            $reset->delete();
        }

        Bus::dispatch(new SendEmailChangeRequest($user, $email));
    }

    /**
     * Confirm's the user's email change request.
     *
     * @param $token
     * @return mixed
     */
    public function changeEmailConfirm($token)
    {
        $request = EmailChangeRequest::where('token', $token);
        if ($request->exists()) {
            $change = $request->first();
            Bus::dispatch(new ChangeEmailAddress($change->user(), $change->new_email));
            Event::fire(new EmailUpdatedEvent($change->user()));

            $request->delete();

            return true;
        }
        return false;
    }

    /**
     * Update a user's
     *
     * @param User $user
     * @param array $attributes
     * @return mixed
     */
    public function update(User $user, $attributes = array())
    {
        $user->update($attributes);
    }

    /**
     * Associate a user with their minecraft profile.
     *
     * @param User $user
     * @param $token
     * @return mixed
     */
    public function associateMinecraft(User $user, $token)
    {
        if ($token != null) {
            $mc = Minecraft::where('session_token', $token)->first();
            if ($mc) {
                if ($mc->user_id == null) {
                    $mc->user_id = $user->id;
                    $mc->save();
                }
                return $mc->user_id == $user->id;
            }
        }
        return false;
    }
}