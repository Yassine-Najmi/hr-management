@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employees') }}">Employees</a></li>
                            <li class="breadcrumb-item active">Add</li>
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
                                <h3 class="card-title">Add Employees</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('employees.add_action') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-2 col-form-label">First Name <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                class="form-control col-sm-6" id="first_name" placeholder="First Name">
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-2 col-form-label">Last Name <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control col-sm-6" id="last_name" placeholder="Last Name">
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class="form-control col-sm-6" id="email" placeholder="Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-2 col-form-label">Phone Number <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                                class="form-control col-sm-6" id="phone_number" placeholder="Phone Number">
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="hire_date" class="col-sm-2 col-form-label">Hire Date <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="date" name="hire_date" value="{{ old('hire_date') }}"
                                                class="form-control col-sm-6" id="hire_date" placeholder="Hire Date">
                                            @error('hire_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job" class="col-sm-2 col-form-label">Job <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <select name="job_id" class="form-control col-sm-6" id="job"
                                                value="{{ old('job_id') }}">
                                                <option value="">Select Job</option>
                                                <option value="1">Developer</option>
                                                <option value="2">Designer</option>
                                                <option value="3">Manager</option>
                                                {{-- @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('job_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-2 col-form-label">Salary <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="salary" value="{{ old('salary') }}"
                                                class="form-control col-sm-6" id="salary" placeholder="Salary">
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="commission_pct" class="col-sm-2 col-form-label">Commission PCT <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="commission_pct"
                                                value="{{ old('commission_pct') }}" class="form-control col-sm-6"
                                                id="commission_pct" placeholder="Commission PCT">
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="manager" class="col-sm-2 col-form-label">Manager Name <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <select name="manager_id" class="form-control col-sm-6" id="job"
                                                value="{{ old('manager_id') }}">
                                                <option value="">Select Manager Name</option>
                                                <option value="1">Zakaria</option>
                                                <option value="2">Salma</option>
                                                <option value="3">Yousra</option>
                                                {{-- @foreach ($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('manager_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="department" class="col-sm-2 col-form-label">Department Name <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <select name="department_id" class="form-control col-sm-6" id="department"
                                                value="{{ old('department_id') }}">
                                                <option value="">Select Department Name</option>
                                                <option value="1">IT</option>
                                                <option value="2">HR</option>
                                                <option value="3">Sales</option>
                                                {{-- @foreach ($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('department_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </section>


    </div>
@endsection
