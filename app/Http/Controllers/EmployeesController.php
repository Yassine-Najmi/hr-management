<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{

    public function employeesList(Request $request)
    {

        $employees = User::getAllEmployees($request);

        return view('backend.employees.employeesList', compact('employees'));
    }

    public function add()
    {
        return view('backend.employees.employeesAdd');
    }

    public function add_action(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
        ]);

        $user = new User([
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'password' => Hash::make('123456'),
            'phone_number' => trim($request->phone_number),
            'hire_date' => trim($request->hire_date),
            'job_id' =>   1, // trim($request->job_id),
            'salary' => trim($request->salary),
            'commission_pct' => trim($request->commission_pct),
            'manager_id' => 1, //trim($request->manager_id),
            'department_id' =>  1, //trim($request->department_id),
            'remember_token' => Str::random(50),
            'is_role' => 0,
        ]);

        $user->save();
        return redirect('/admin/employees')->with('success', 'Employee added successfully');
    }
}
