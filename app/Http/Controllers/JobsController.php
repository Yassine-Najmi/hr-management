<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index() {
        $jobs = Jobs::getRecord();
        return view('backend.jobs.list', compact('jobs'));
    }

    public function add() {
        return view('backend.jobs.add');
    }

    public function add_post(Request $request) {
        $job = new Jobs;
        $request->validate([
            'job_title' => 'required',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
        ]);
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', "Job has been added successfully");
    }

    public function view($id) {
        $job = Jobs::find($id);
        return view('backend.jobs.view',compact('job'));
    }
}
