<?php

namespace App\Livewire\Backend\Employees;

use App\Models\Jobs;
use App\Models\User;
use Livewire\Component;

class EmployeesList extends Component
{

    public function index()
    {
        return view('backend.employees.list');
    }


    public function view($id)
    {
        $user = User::find($id);
        return view('backend.employees.view', compact('user'));
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/employees')->with('success', "Employee has been deleted successfully");
    }
    public function render()
    {
        $users = User::getRecord();
        return view('livewire.backend.employees.employeesList', compact('users'));
    }
}
