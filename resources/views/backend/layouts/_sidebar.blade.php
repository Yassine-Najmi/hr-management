  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a wire:navigate="dashboard" class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif"
                  href="{{ url('admin/dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a wire:navigate="employees" class="nav-link @if (Request::segment(2) != 'employees') collapsed @endif"
                  href="{{ url('admin/employees') }}">
                  <i class="bi bi-people"></i>
                  <span>Employees</span>
              </a>
          </li><!-- End employees Page Nav -->

          <li class="nav-item">
              <a wire:navigate="jobs" class="nav-link @if (Request::segment(2) != 'jobs') collapsed @endif"
                  href="{{ url('admin/jobs') }}">
                  <i class="bi bi-briefcase"></i>
                  <span>Jobs</span>
              </a>
          </li><!-- End jobs Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/job_history') }}">
                  <i class="bi bi-archive"></i>
                  <span>Job History</span>
              </a>
          </li><!-- End job history Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('job_grades') }}">
                  <i class="bi bi-star"></i>
                  <span>Job Grades</span>
              </a>
          </li><!-- End job grades Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/departements') }}">
                  <i class="bi bi-building"></i>
                  <span>Departements</span>
              </a>
          </li><!-- End departements Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/countries') }}">
                  <i class="bi bi-flag"></i>
                  <span>Countries</span>
              </a>
          </li><!-- End countries Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/locations') }}">
                  <i class="bi bi-geo-alt"></i>
                  <span>Locations</span>
              </a>
          </li><!-- End locations Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/regions') }}">
                  <i class="bi bi-asterisk"></i>
                  <span>Regions</span>
              </a>
          </li><!-- End regions Page Nav -->

      </ul>

  </aside><!-- End Sidebar-->
