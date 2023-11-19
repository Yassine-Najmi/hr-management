@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/employees/')}}">Employees</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
  
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
  
                <img src="{{url('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                <h2>{{$user->name . ' '. $user->last_name}}</h2>
                <h3>{{$user->job_id}}</h3>
              </div>
            </div>
  
          </div>
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    {{-- <h5 class="card-title">About</h5> --}}
  
                    <h5 class="card-title">Profile Details</h5>
  
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Employee ID</div>
                        <div class="col-lg-9 col-md-8">{{$user->id}}</div>
                      </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8">{{$user->name . ' '. $user->last_name}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email ID</div>
                      <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone Number</div>
                      <div class="col-lg-9 col-md-8">{{$user->phone_number}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Hire Date</div>
                      <div class="col-lg-9 col-md-8">{{date('d/m/Y', strtotime($user->hire_date))}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Job ID</div>
                      <div class="col-lg-9 col-md-8">{{!empty($user->job->job_title) ? $user->job->job_title : ''}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Slary</div>
                      <div class="col-lg-9 col-md-8">{{$user->salary}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Commission PCT</div>
                        <div class="col-lg-9 col-md-8">{{$user->commission_pct}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Manager Name</div>
                        <div class="col-lg-9 col-md-8">{{$user->manager_id}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Department Name</div>
                        <div class="col-lg-9 col-md-8">{{$user->department_id}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Role</div>
                        <div class="col-lg-9 col-md-8">{{!empty($user->is_role) ? 'HR' : 'Employee'}}</div>
                    </div>

                      
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Created Date</div>
                        <div class="col-lg-9 col-md-8">{{date('d/m/Y H:i', strtotime($user->created_at))}}</div>
                    </div>

                      
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Updated Date</div>
                        <div class="col-lg-9 col-md-8">{{date('d/m/Y H:i', strtotime($user->updated_at))}}</div>
                    </div>
                  </div>

  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
@endsection