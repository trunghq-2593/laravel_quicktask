<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()){
            return redirect()->route('tasks');
        } else {
            return view('auth.login');
        }
    }

    public function handleLogin(Request $request)
    {
        return redirect()->route('tasks');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('auth.loginForm');
    }
}
