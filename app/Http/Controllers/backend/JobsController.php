<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Exports\JobsExport;
use Maatwebsite\Excel\Facades\Excel;

class JobsController extends Controller
{
    public function index(Request $request) {
        $jobs = Jobs::getRecord($request);
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

    public function edit($id) {
        $job = Jobs::find($id);
        return view('backend.jobs.edit',compact('job'));
    }

    public function edit_post(Request $request) {
        $job = Jobs::find($request->id);
        $request->validate([
            'job_title' => 'required',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
        ]);
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', "{$job->job_title} has been updated successfully");
    }

    public function delete($id) {
        $job = Jobs::find($id);
        $job->delete();
        return redirect()->back()->with('success', "{$job->job_title} has been deleted successfully");
    }

    public function export() {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}