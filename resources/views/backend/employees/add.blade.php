@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/employees/') }}">Employees</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-lg-12">

        <div class="card card-info">
            <div class="card-body">
                <h5 class="card-title">Add Employees</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                        <label for="name" class="form-label">First Name<span class="text-danger"> *</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            id="name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="last_name" class="form-label">Last Name<span class="text-danger"> *</span></label>
                        <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control"
                            id="last_name">
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            id="email">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="phone_number" class="form-label">Phone Number<span class="text-danger"> *</span></label>
                        <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="form-control"
                            id="phone_number">
                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="hire_date" class="form-label">Hire Date<span class="text-danger"> *</span></label>
                        <input type="date" value="{{ old('hire_date') }}" name="hire_date" class="form-control"
                            id="hire_date">
                        <span class="text-danger">{{ $errors->first('hire_date') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="job_id" class="form-label">Job Title<span class="text-danger"> *</span></label>
                        <div class="col-12">
                            <select class="form-select" name="job_id" id="job_id">
                                <option selected value="0">Select Job Title</option>
                                @foreach ($jobs as $job)             
                                <option value="{{{ $job->id }}}">{{$job->job_title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('job_id') }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="salary" class="form-label">Salary<span class="text-danger"> *</span></label>
                        <input type="number" value="{{ old('salary') }}" name="salary" class="form-control"
                            id="salary">
                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="commission_pct" class="form-label">Commission PCT<span class="text-danger">
                                *</span></label>
                        <input type="number" value="{{ old('commission_pct') }}" name="commission_pct"
                            class="form-control" id="commission_pct">
                        <span class="text-danger">{{ $errors->first('commission_pct') }}</span>
                    </div>
                    <div class="col-6">
                        <label for="manager_id" class="form-label">Manager Name<span class="text-danger"> *</span></label>
                        <div class="col-12">
                            <select class="form-select" name="manager_id" id="manager_id">
                                <option selected value="0">Select Manager Name</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('manager_id') }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="department_id" class="form-label">Dapartment Name<span class="text-danger">
                                *</span></label>
                        <div class="col-12">
                            <select class="form-select" name="department_id" id="department_id">
                                <option selected value="0">Select Department Name</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('department_id') }}</span>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary mx-3 px-4">Submit</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
