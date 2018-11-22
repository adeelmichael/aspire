<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard');
        }
            //dd(Auth::user()->role == 'admin');
        return redirect('/admin');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/admin');
    }

}
