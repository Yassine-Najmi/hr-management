@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Jobs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
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
                <h2>{{$job->job_title}}</h2>
              </div>
            </div>
  
          </div>
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    {{-- <h5 class="card-title">About</h5> --}}
  
                    <h5 class="card-title">Job Details</h5>
  
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Job ID</div>
                        <div class="col-lg-9 col-md-8">{{$job->id}}</div>
                      </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Job Title</div>
                      <div class="col-lg-9 col-md-8">{{$job->job_title}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Min Salary</div>
                      <div class="col-lg-9 col-md-8">{{$job->min_salary}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Max Salary</div>
                      <div class="col-lg-9 col-md-8">{{$job->max_salary}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Created At</div>
                      <div class="col-lg-9 col-md-8">{{date('d/m/Y H:i', strtotime($job->created_at))}}</div>
                    </div>
  
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Updated At</div>
                        <div class="col-lg-9 col-md-8">{{date('d/m/Y H:i', strtotime($job->updated_at))}}</div>
                      </div>
                  </div>

  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
@endsection