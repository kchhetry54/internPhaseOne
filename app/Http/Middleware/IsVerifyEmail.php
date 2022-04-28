<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsVerifyEmail
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
        $user = array();

        if(Session::has('loginId')){
            $user = User::where('id', '=', Session::get('loginId'))->first();
        }
        if (!$user->is_email_verified) {
        auth()->logout();
        return redirect()->route('login')
        ->with('fail', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return $next($request);
        }
}
