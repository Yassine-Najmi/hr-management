<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    // Login
    public function index(): View
    {
        return view('auth.login');
    }

    // Login Action
    public function login_action(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {

            if (Auth::user()->is_role == 1) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/')->with('error', 'you are not authorized');
            }
        } else {

            return back()->with('error', 'Incorrect email or password');
        }
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User([
            'first_name' => trim($request->first_name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50),

        ]);

        $user->save();
        return redirect('/')->with('success', 'Registration successful');
    }

    // Forgot Password
    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
