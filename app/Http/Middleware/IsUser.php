<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 'guest' ) {
                return $next($request);
            } else {
                return redirect()->route('home');
            }
        } else {
            if (isset($request->user_id)) {
                $user = User::where('id', $request->user_id)->first();

                if ($user->role == 'guest') {
                    return $next($request);
                } else {
                    return redirect()->route('home');
                }
            } else {
                return $next($request);
            }
        }
    }
}
