<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
    public function dashboard()
    {
        return view('backend.dashboard.list');
    }
    public function render()
    {
        return view('livewire.backend.dashboard');
    }
}
