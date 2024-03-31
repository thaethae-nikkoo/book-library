<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect(url('/home'));
        } else {
            return redirect()->back()->with('error', 'Invalid User email or password.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));

    }

}
