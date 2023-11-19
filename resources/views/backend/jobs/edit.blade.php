@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/jobs/') }}">Jobs</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ url('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $job->job_title }}</h2> 
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                <h5 class="card-title mb-3">Job Edit</h5>
                                <!-- Profile Edit Form -->
                                <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Job
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ url('assets/img/profile-img.jpg') }}" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                        @csrf
                                        <div class="col-6">
                                            <label for="job_title" class="form-label">Job Title<span class="text-danger">
                                                    *</span></label>
                                            <input type="text" value="{{ $job->job_title }}" name="job_title"
                                                class="form-control" id="job_title">
                                            <span class="text-danger">{{ $errors->first('job_title') }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label for="min_salary" class="form-label">Min Salary<span class="text-danger">
                                                    *</span></label>
                                            <input type="number" value="{{ $job->min_salary }}" name="min_salary"
                                                class="form-control" id="min_salary">
                                            <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label for="max_salary" class="form-label">Max Salary<span class="text-danger">
                                                    *</span></label>
                                            <input type="number" value="{{ $job->max_salary }}" name="max_salary"
                                                class="form-control" id="max_salary">
                                            <span class="text-danger">{{ $errors->first('max_salary') }}</span>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary mx-3 px-4">Save Changes</button>
                                        </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
