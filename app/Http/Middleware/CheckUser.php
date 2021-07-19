<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return $next($request);
        } else {
            return redirect()->route('auth.loginForm')->with('errors','Thông tin bạn nhập không đúng');
        }
    }
}
