<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register(): View
    {
        return view('register');
    }

    public function register_post()
    {
        // dd($this->all());
        $user = new User();
        $this->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


        $user->name = trim($this->name);
        $user->email = trim($this->email);
        $user->password = Hash::make($this->password);
        $user->remember_token = Str::random(40);
        $user->save();

        return redirect('/')->with('success', "Register successfully");
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
