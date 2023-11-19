<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Validation\Rule;



class EmployeesController extends Controller
{
    public function index () {
        $users = User::getRecord();
        return view('backend.employees.list', compact('users'));
    }

    public function add (Request $request) {
        $jobs = Jobs::getJob();
        return view('backend.employees.add', compact('jobs'));
    }

    public function add_post(Request $request) {
        $user = new User;
        $request->validate([
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

        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; // 0 - Employees
        $user->save();

        return redirect('admin/employees')->with('success', "Employee has been added successfully");
    }

    public function view ($id) {
        $user = User::find($id);
        return view('backend.employees.view',compact('user'));
    }

    public function edit ($id) {
        $data['user']= User::find($id);
        $data['jobs'] = Jobs::getRecord();
        return view('backend.employees.edit',$data);
    }

    public function edit_post(Request $request, $id) {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required|notIn:0',
            'salary' => 'required|numeric',
            'commission_pct' => 'required|numeric',
            'manager_id' => 'required|notIn:0',
            'department_id' => 'required|notIn:0',
        ]);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; // 0 - Employees
        $user->save();
        return redirect('admin/employees')->with('success', "Employee has been updated successfully");
    }

    public function delete ($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/employees')->with('success', "Employee has been deleted successfully");   
    }
}
