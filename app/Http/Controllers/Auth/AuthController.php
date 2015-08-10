<?php

namespace App\Http\Controllers\Auth;

use App\Models\Country;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showRegister()
    {
        $countries = array();
        foreach(Country::all() as $country) {
            $countries = array_add($countries, $country->id, $country->name);
        }
        return view('auth.register')->with(['countries' => $countries]);
    }

    /**
     * Login the user.
     *
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $success = Auth::attempt($request->only(['email', 'password']));
        if (!$success) return redirect()->back()->withErrors([
            'login_failed' => Lang::get('auth.login_failed'),
        ]);
        return redirect()->intended();
    }

    /**
     * Register the user.
     *
     * @param RegisterRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $success = $this->repository->create($request->all());
        if (!$success) return redirect()->back()->withErrors([
            'register_failed' => Lang::get('auth.register_failed'),
        ]);
        return redirect()->route('auth.login')->with(['notice' => Lang::get('auth.register_success')]);
    }

    /**
     * Verify the user's email address.
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($token)
    {
        $success = $this->repository->verify($token);
        $notice = ($success) ? Lang::get('auth.verification_success') : Lang::get('auth.verification_failed');
        return redirect()->route('auth.login')->with(['notice' => $notice]);
    }

    /**
     * Send a password reset link.
     *
     * @param ForgotPasswordRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $success = $this->repository->forgotPassword($request->get('email'));
        if (!$success) return redirect()->back()->withErrors([
            'password_reset_unknown' => Lang::get('password_reset_unknown'),
        ]);
        return redirect()->route('auth.login')->with(['notice' => Lang::get('auth.password_reset_sent')]);
    }

    /**
     * Reset a user's password.
     *
     * @param $token
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function resetPassword($token)
    {
        $success = $this->repository->resetPassword($token);
        if (!$success) return redirect()->back()->withErrors([
            'password_reset_failed' => Lang::get('auth.password_reset_failed'),
        ]);
        return redirect()->route('auth.login')->with(['notice' => Lang::get('auth.password_reset_success')]);
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with(['notice' => Lang::get('auth.logged_out')]);
    }

}
