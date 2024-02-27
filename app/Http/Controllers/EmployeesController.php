<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function employeesList()
    {
        return view('backend.employees.employeesList');
    }

    public function add()
    {
        return view('backend.employees.employeesAdd');
    }

    public function add_action(Request $request)
    {
        dd($request->all());
    }
}
