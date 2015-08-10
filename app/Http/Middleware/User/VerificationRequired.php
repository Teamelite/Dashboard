<?php

namespace App\Http\Middleware\User;

use App\User;
use Closure;
use Illuminate\Support\Facades\Lang;

class VerificationRequired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = null;
        if ($request->has('email')) {
            $user = User::where('email', $request->get('email'));
            if ($user->exists()) {
                $user = $user->first();
            }
        } else if ($request->user()) {
            $user = $request->user();
        }

        if ($user) {
            if ($user->first()->verified == false) {
                return redirect()->back()->with(['notice' => Lang::get('auth.verification_required')]);
            }
        }
        return $next($request);
    }
}
