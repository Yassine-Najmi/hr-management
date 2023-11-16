@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Jobs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/jobs') }}">Jobs</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-lg-12">

        <div class="card card-info">
            <div class="card-body">
                <h5 class="card-title">Add Jobs</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                        <label for="job_title" class="form-label">Job Title<span class="text-danger"> *</span></label>
                        <input type="text" value="{{ old('job_title') }}" name="job_title" class="form-control"
                            id="job_title">
                        <span class="text-danger">{{ $errors->first('job_title') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="min_salary" class="form-label">Min Salary<span class="text-danger"> *</span></label>
                        <input type="number" value="{{ old('min_salary') }}" name="min_salary" class="form-control"
                            id="min_salary">
                        <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="max_salary" class="form-label">Max Salary<span class="text-danger"> *</span></label>
                        <input type="number" value="{{ old('max_salary') }}" name="max_salary" class="form-control"
                            id="max_salary">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary mx-3 px-4">Submit</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
