<?php

namespace App\Livewire\Backend\Employees;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EmployeeCreate extends Component
{

    public $name;
    public $last_name;
    public $email;
    public $phone_number;
    public $hire_date;
    public $job_id;
    public $salary;
    public $commission_pct;
    public $manager_id;
    public $department_id;


    public function add()
    {

        // return redirect()->to('admin/employees/add');
        return view('backend.employees.add');
    }

    public function add_post()
    {

        $user = new User();
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required|notIn:0',
            'salary' => 'required|numeric',
            'commission_pct' => 'required|numeric',
            'manager_id' => 'required|notIn:0',
            'department_id' => 'required|notIn:0',
        ]);

        $user->name = trim($this->name);
        $user->last_name = trim($this->last_name);
        $user->email = trim($this->email);
        $user->phone_number = trim($this->phone_number);
        $user->hire_date = trim($this->hire_date);
        $user->job_id = trim($this->job_id);
        $user->salary = trim($this->salary);
        $user->commission_pct = trim($this->commission_pct);
        $user->manager_id = trim($this->manager_id);
        $user->department_id = trim($this->department_id);
        $user->is_role = 0; // 0 - Employees
        $user->save();

        // $this->reset();


        session()->flash('success', "Employee has been added successfully");

        return redirect()->to('admin/employees');
    }
    public function render()
    {
        $jobs = Jobs::getJob();
        return view('livewire.backend.employees.employee-create', compact('jobs'));
    }
}
