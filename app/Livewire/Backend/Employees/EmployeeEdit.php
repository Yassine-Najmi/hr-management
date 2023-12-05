<?php

namespace App\Livewire\Backend\Employees;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EmployeeEdit extends Component
{
    protected $debug = true;


    public $user;
    public $id;
    public $jobs;
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


    public function mount($user, $jobs, $id)
    {

        $this->user = $user;
        $this->jobs = $jobs;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->hire_date = $user->hire_date;
        $this->job_id = $user->job_id;
        $this->salary = $user->salary;
        $this->commission_pct = $user->commission_pct;
        $this->manager_id = $user->manager_id;
        $this->department_id = $user->department_id;
    }

    public function edit($id)
    {
        $user = User::find($id);
        $jobs = Jobs::getRecord();
        return view('backend.employees.edit', compact('user', 'jobs'));
    }

    public function edit_post(User $user)
    {
        // dd($this->user->toArray());

        $user = User::find($this->user->id);
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
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


        Session::flash('success', "Employee has been updated successfully");
        return redirect()->to('admin/employees');
    }

    public function render()
    {

        return view('livewire.backend.employees.employee-edit');
    }
}
