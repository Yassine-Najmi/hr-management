@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee #{{ $user->id }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employees') }}">Employees</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">View Employee</h3>

                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="id" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        {{ $user->id }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        {{ $user->first_name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        {{ $user->last_name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        {{ $user->email }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        {{ $user->phone_number }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="hire_date" class="col-sm-2 col-form-label">Hire Date</label>
                                    <div class="col-sm-10">
                                        {{ $user->hire_date->format('F j, Y') }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="job" class="col-sm-2 col-form-label">Job</label>
                                    <div class="col-sm-10">
                                        {{ $user->job_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                                    <div class="col-sm-10">
                                        {{ $user->salary }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="commission_pct" class="col-sm-2 col-form-label">Commission PCT</label>
                                    <div class="col-sm-10">
                                        {{ $user->commission_pct }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="manager" class="col-sm-2 col-form-label">Manager Name</label>
                                    <div class="col-sm-10">
                                        {{ $user->manager_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department" class="col-sm-2 col-form-label">Department Name</label>
                                    <div class="col-sm-10">
                                        {{ $user->department_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department" class="col-sm-2 col-form-label">Created At</label>
                                    <div class="col-sm-10">
                                        {{ $user->created_at->format('F j, Y h:i A') }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department" class="col-sm-2 col-form-label">Last Updated</label>
                                    <div class="col-sm-10">
                                        {{ $user->updated_at->format('F j, Y h:i A') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
