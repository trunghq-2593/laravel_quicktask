<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('tasks')->with('message', 'Đăng nhập thành công');
    }

    public function handleLogin(LoginRequest $request)
    {
        $attributes = $request->validated();
        if (Auth::attempt($attributes)) {
            return redirect()->route('tasks')->with('message', 'Đăng nhập thành công');
        } else {
            return view('auth.login')->with('message', __('loginFail'));
        }
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->route('auth.loginForm')->with('message','Đăng xuất thành công');
    }
}
