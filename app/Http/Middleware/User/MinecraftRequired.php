<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Support\Facades\Lang;

class MinecraftRequired
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
        if ($request->user()) {
            if ($request->user()->minecraft() == null) {
                return redirect()->back()->with([
                   'notice' => Lang::get('user.minecraft_required'),
                ]);
            }
        }

        return $next($request);
    }
}
