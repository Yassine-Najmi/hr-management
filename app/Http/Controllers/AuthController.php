<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function index(): View {
        return view('login');
    }

    public function forgot_password(Request $request): View{
        return view('forgot_password');
    }

    public function register (): View {
        return view('register');
    }

    public function register_post(Request $request) {
        $user = new User;
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        

            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect('/')->with('success', "Register successfully");


    }

    public function CheckEmail(Request $request){
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists){
            return response()->json((array("exists" => true)));
        } else {
            return response()->json((array("exists" => false)));
        }
    }
}
