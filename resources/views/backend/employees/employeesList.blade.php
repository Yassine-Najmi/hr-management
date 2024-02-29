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
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div> --}}
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('layouts._message')
                <!-- Small boxes (Stat box) -->

                <a href="{{ route('employees.add') }}" class=" btn btn-primary mb-3">Add Employee</a>
                <div class="row">
                    <section class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of all employees</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="d-flex justify-content-between px-4 pt-3 align-items-center">
                                <div>
                                    <button class="btn btn-secondary px-4" id="excel">Excel</button>
                                    <button class="btn btn-secondary ml-3 px-4" id="pdf">PDF</button>
                                </div>
                                <form method="get" action="{{ route('employees') }}">
                                    @csrf
                                    <div class="input-group rounded ">
                                        <input type="text" name="search" value="{{ Request::get('search') }}"
                                            class="form-control rounded" placeholder="Search" aria-label="Search"
                                            aria-describedby="search-addon" />
                                        <button type="submit" class="input-group-text ml-1 border-0" id="search-addon">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="mb-5 table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Hire Date</th>
                                            <th>Job</th>
                                            <th>Salary</th>
                                            <th>Commission Pct</th>
                                            <th>Manager</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->id }}</td>
                                                <td>{{ $employee->first_name }}</td>
                                                <td>{{ $employee->last_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone_number }}</td>
                                                <td>{{ $employee->hire_date }}</td>
                                                <td>{{ $employee->job_id }}</td>
                                                <td>{{ $employee->salary }}</td>
                                                <td>{{ $employee->commission_pct }}</td>
                                                <td>{{ $employee->manager_id }}</td>
                                                <td>{{ $employee->department_id }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('employees.view', $employee->id) }}"
                                                            class="btn btn-info btn-sm">View</a>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No records found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-center">
                                    {{ $employees->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </section>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
