<div>
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('layouts._message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Employees</h3>
            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="GET" action="#">
                    <div class="card-body">
                        <div class=" row justy-content-start align-items-end">
                            <div class="form-group col-md-1">
                                <label for="">ID</label>
                                <input type="text" placeholder="Search" value="{{ Request()->id }}" name="id"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">First Name</label>
                                <input type="text" placeholder="Search" value="{{ Request()->name }}" name="name"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Last Name</label>
                                <input type="text" placeholder="Search" value="{{ Request()->last_name }}"
                                    name="last_name" class="form-control">
                            </div>
                            <div class="form-group col-md-3 ">
                                <button class="btn btn-primary" type="submit">Search</button>
                                <a href="{{ url('admin/employees') }}" class="btn btn-success">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- End Search Bar -->
        </div>

        <div class="card-body">
            <div class="mt-3">
                <h5 class="card-title d-inline">Employees List</h5>
                <a wire:navigate href="{{ url('admin/employees/add') }}" class="btn btn-primary float-end ">Add
                    Employees</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ !empty($user->is_role) ? 'HR' : 'Employee' }}</td>
                            <td class="text-center">
                                <a wire:navigate href="{{ url('admin/employees/view/' . $user->id) }}"
                                    class="btn btn-info">View</a>
                                <a wire:navigate href="{{ url('admin/employees/edit/' . $user->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <a wire:navigate href="{{ url('admin/employees/delete/' . $user->id) }}"
                                    onclick="return confirm('Are you sure you want to delete {{ $user->last_name }}')"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="100%" class="text-center">No Record Found.</td>
                    @endforelse

                </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{ $users->links() }}
        </div>
    </div>
</div>
