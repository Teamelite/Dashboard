<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Account\EmailChangeRequest;
use App\Http\Requests\User\Account\PasswordChangeRequest;
use App\Http\Requests\User\Account\SettingsUpdateRequest;
use App\Models\Country;
use App\Repositories\ApplicationRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Console\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class AccountController extends Controller
{
    /**
     * Show the user's account.
     *
     * @return \Illuminate\View\View
     */
    public function showAccount(ApplicationRepository $applicationRepository)
    {
        $countries = array();
        foreach(Country::all() as $country) {
            $countries = array_add($countries, $country->id, $country->name);
        }
        return view('user.account')->with([
            'applications' => $applicationRepository->getAll(Auth::user()),
            'countries' => $countries,
        ]);
    }

    /**
     * Change the user's password.
     *
     * @param UserRepository $repository
     * @param PasswordChangeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(UserRepository $repository, PasswordChangeRequest $request)
    {
        if (Hash::check($request->get('current_password'), Auth::user()->password)) {
            $repository->changePassword(Auth::user(), $request->get('password'));

            return redirect()->back()->with([
                'notice' => Lang::get('auth.password_changed')
            ]);
        }
        return redirect()->back()->withErrors([
            'password_no_match' => Lang::get('auth.password_no_match')
        ]);
    }

    /**
     * Send an email change request to the user.
     *
     * @param UserRepository $repository
     * @param EmailChangeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeEmailRequest(UserRepository $repository, EmailChangeRequest $request)
    {
        $repository->changeEmailRequest(Auth::user(), $request->get('email'));

        return redirect()->back()->with([
            'notice' => Lang::get('auth.email_change_sent'),
        ]);
    }

    /**
     * Confirm a user's email change request.
     *
     * @param UserRepository $repository
     * @param $token
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changeEmailConfirm(UserRepository $repository, $token)
    {
        $success = $repository->changeEmailConfirm($token);
        if ($success) {
            return redirect()->route('auth.logout')->with([
                'notice' => Lang::get('auth.email_change_confirmed'),
            ]);
        }
        return redirect()->back()->withErrors([
            'notice' => Lang::get('auth.email_change_failed'),
        ]);
    }

    /**
     * Update the user.
     *
     * @param UserRepository $userRepository
     * @param SettingsUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRepository $userRepository, SettingsUpdateRequest $request) {
        $userRepository->update(Auth::user(), $request->all());

        return redirect()->back()->with([
            'notice' => Lang::get('user.user_updated'),
        ]);
    }

    /**
     * Confirm the association of a minecraft profile.
     *
     * @param null $token
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function minecraftConfirm(UserRepository $repository, $token = null) {
        if (Auth::user()->minecraft() == null) {
            $success = $repository->associateMinecraft(Auth::user(), $token);

            if ($success) {
                return redirect()->route('user.account')->with([
                    'message' => Lang::get('account.settings.minecraft_success'),
                ]);
            } else {
                return redirect()->route('user.account')->withErrors([
                    'minecraft_failed' => Lang::get('account.settings.minecraft_failed'),
                ]);
            }
        }
        return redirect()->route('user.account')->with([
            'notice' => Lang::get('user.minecraft_already_linked'),
        ]);
    }

}
