@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Jobs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Jobs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('layouts._message')
    <div class="card">
        <div class="card-header">
            <div class="d-flex mx-3 justify-content-between align-items-center">

                <h3 class="card-title ">Search Jobs</h3>
                <div class="excel-bar">
                    <form class="" action="{{url('admin/jobs/export')}}" method="get">
                        <input type="hidden" name="start_date" value="{{Request()->start_date}}">
                        <input type="hidden" name="end_date" value="{{Request()->end_date}}">
                        <a class="btn btn-primary" href="{{url('admin/jobs/export?start_date='.Request()->start_date.'&end_date='.Request()->end_date)}}')}}">Export CSV</a>
                    </form>
                </div>
            </div>
            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="GET" action="#">
                    <div class="card-body">
                        <div class=" row justy-content-start align-items-end">
                            <div class="form-group col-md-1">
                                <label for="">ID</label>
                                <input type="text" placeholder="Search" value="{{Request()->id}}" name="id" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Job Title</label>
                                <input type="text" placeholder="Search" value="{{Request()->job_title}}" name="job_title" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">From Date</label>
                                <input type="date" value="{{Request()->start_date}}" name="start_date" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">To Date</label>
                                <input type="date" value="{{Request()->end_date}}" name="end_date" class="form-control">
                            </div>

                            <div class="form-group col-md-3 ">
                                <button class="btn btn-primary" type="submit">Search</button>
                                <a href="{{url('admin/jobs')}}" class="btn btn-success">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- End Search Bar -->
        </div>
          
        <div class="card-body">
            <div class="mt-3">
                <h5 class="card-title d-inline">Jobs List</h5>
                <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary float-end ">Add Jobs</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Min Salary</th>
                        <th scope="col">Max Salary</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                    <tr>
                        <th scope="row">{{$job->id}}</th>
                        <td>{{$job->job_title}}</td>
                        <td>{{$job->min_salary}}</td>
                        <td>{{$job->max_salary}}</td>
                        <td>{{date('d-m-Y H:i', strtotime($job->created_at))}}</td>
                        <td class="text-center">
                            <a href="{{url('admin/jobs/view/' . $job->id)}}" class="btn btn-info">View</a>
                            <a href="{{url('admin/jobs/edit/' . $job->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/jobs/delete/' . $job->id)}}" onclick="return confirm('Are you sure you want to delete the job {{$job->job_title}}')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty  
                    <td colspan="100%" class="text-center">No Record Found.</td>
                    @endforelse
                    
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{$jobs->links()}}
        </div>
    </div>
@endsection
