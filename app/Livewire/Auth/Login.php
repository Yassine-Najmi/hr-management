<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $remember;

    public function index(): View
    {
        return view('login');
    }
    public function login_post()
    {

        // dd($this->all());

        $remember = $this->remember ? true : false;

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $remember)) {
            if (Auth::user()->is_role == '1') {
                return redirect()->intended('admin/dashboard');
            } else {
                session()->flash('error', 'No HR Availables..please check');
                // return redirect()->to('/')->with('error', 'No HR Availables..please check');
            }
        } else {
            session()->flash('error', 'Please enter the correct credentials');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
