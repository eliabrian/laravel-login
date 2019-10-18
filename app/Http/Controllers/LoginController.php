<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin');
        } else if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('/user');
        }

        return back()->withErrors(['email' => 'Email are not registered.']);
    }
}
