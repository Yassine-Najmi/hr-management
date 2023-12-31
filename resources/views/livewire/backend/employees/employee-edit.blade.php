<div>
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a wire:navigate href="{{ url('admin/employees/') }}">Employees</a></li>
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
                        <h2>{{ $user->name . ' ' . $user->last_name }}</h2>
                        <h3>{{ $user->job_id }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                <h5 class="card-title mb-3">Profile Edit</h5>
                                <!-- Profile Edit Form -->
                                <form wire:submit.prevent="edit_post" class="row g-3" action=""
                                    enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
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
                                        <label for="name" class="form-label">First Name<span class="text-danger">
                                                *</span></label>
                                        <input wire:model="name" type="text" value="{{ $user->name }}"
                                            name="name" class="form-control" id="name">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name" class="form-label">Last Name<span class="text-danger">
                                                *</span></label>
                                        <input wire:model="last_name" type="text" value="{{ $user->last_name }}"
                                            name="last_name" class="form-control" id="last_name">
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label">Email<span class="text-danger">
                                                *</span></label>
                                        <input wire:model="email" type="email" value="{{ $user->email }}"
                                            name="email" class="form-control" id="email">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="phone_number" class="form-label">Phone Number<span
                                                class="text-danger">
                                                *</span></label>
                                        <input wire:model="phone_number" type="text"
                                            value="{{ $user->phone_number }}" name="phone_number" class="form-control"
                                            id="phone_number">
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="hire_date" class="form-label">Hire Date<span class="text-danger">
                                                *</span></label>
                                        <input wire:model="hire_date" type="date" value="{{ $user->hire_date }}"
                                            name="hire_date" class="form-control" id="hire_date">
                                        <span class="text-danger">{{ $errors->first('hire_date') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="job_id" class="form-label">Job Title<span class="text-danger">
                                                *</span></label>
                                        <div class="col-12">
                                            <select wire:model="job_id" class="form-select" name="job_id"
                                                id="job_id">
                                                @foreach ($jobs as $job)
                                                    <option {{ $job->id == $user->job_id ? 'selected' : '' }}
                                                        value="{{ $job->id }}">{{ $job->job_title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('job_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="salary" class="form-label">Salary<span class="text-danger">
                                                *</span></label>
                                        <input wire:model="salary" type="number" value="{{ $user->salary }}"
                                            name="salary" class="form-control" id="salary">
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="commission_pct" class="form-label">Commission PCT<span
                                                class="text-danger">
                                                *</span></label>
                                        <input wire:model="commission_pct" type="number"
                                            value="{{ $user->commission_pct }}" name="commission_pct"
                                            class="form-control" id="commission_pct">
                                        <span class="text-danger">{{ $errors->first('commission_pct') }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label for="manager_id" class="form-label">Manager Name<span
                                                class="text-danger">
                                                *</span></label>
                                        <div class="col-12">
                                            <select wire:model="manager_id" class="form-select" name="manager_id"
                                                id="manager_id">
                                                <option selected value="0">Select Manager Name</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('manager_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="department_id" class="form-label">Dapartment Name<span
                                                class="text-danger">
                                                *</span></label>
                                        <div class="col-12">
                                            <select wire:model="department_id" class="form-select"
                                                name="department_id" id="department_id">
                                                <option selected value="0">Select Department Name</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary mx-3 px-4">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
