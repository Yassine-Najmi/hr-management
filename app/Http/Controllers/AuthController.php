<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{

    // Login
    public function index(): View
    {
        return view('auth.login');
    }

    // Register
    public function register(): View
    {
        return view('auth.register');
    }

    // Register Action
    public function register_action(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        dd($request->all());
    }

    // Forgot Password
    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }
}
