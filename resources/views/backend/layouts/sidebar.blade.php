<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if($logo)
          <img src="{{ asset('Logo/'.$logo->logo_pic) }}" class="img-circle elevation-2" alt="img">

        @else
          <img src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" class="img-circle elevation-2" alt="Default profile picture">
        @endif
      </div>
      <span style=" font-weight:bold" class="ml-4">E-TRABAHO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(auth()->user()->profile_pic)
            <img src="{{ asset('uploads/'.auth()->user()->profile_pic) }}" class="img-circle elevation-2" alt="img">

          @else
            <img src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" class="img-circle elevation-2" alt="Default profile picture">
          @endif
        </div>
        <div class="info">
          <a href="{{ URL::to('/profile') }}" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if (auth()->user()->role=='admin')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('alluser.admin') }}" class="nav-link">
                  <i class="far fa fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('alluser.freelancer') }}" class="nav-link">
                  <i class="far fa fa-user nav-icon"></i>
                  <p>Freelancers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('alluser.employers') }}" class="nav-link">
                  <i class="far fa fa-user nav-icon"></i>
                  <p>Employers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/add-user-index') }}" class="nav-link">
                  <i class="far fa fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-box-open"></i>
              <p>
                Job Title
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/all-jobtitle') }}" class="nav-link">
                  <i class="far fa fa-box-open nav-icon"></i>
                  <p>All Job Title</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/add-jobtitle-index') }}" class="nav-link">
                  <i class="far fa fa-plus-circle nav-icon"></i>
                  <p>Add Job Title</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-map-marker-alt"></i>
              <p>
                Address
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/all-address') }}" class="nav-link">
                  <i class="far fa fa-map-marker-alt nav-icon"></i>
                  <p>All Address</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/add-address-index') }}" class="nav-link">
                  <i class="far fa fa-plus-circle nav-icon"></i>
                  <p>Add Address</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-layer-group"></i>
              <p>
                Skills
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/all-skills') }}" class="nav-link">
                  <i class="far fa fa-layer-group nav-icon"></i>
                  <p>All Skill</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/add-skills-index') }}" class="nav-link">
                  <i class="far fa fa-plus-circle nav-icon"></i>
                  <p>Add Skill</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">MANAGE PROFILE</li>
          <li class="nav-item">
            <a href="{{ URL::to('/profile/') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-header">MANAGE WEB LOGO</li>
          <li class="nav-item">
            <a href="{{ route('logo.index') }}" class="nav-link">
              <i class="nav-icon far fa-star"></i>
              <p>Web Logo</p>
            </a>
          </li>

          <li class="nav-header">VIEW TRANSACTION</li>
          <li class="nav-item">
            <a href="{{ route('hiring.admin.transaction') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Hiring Transaction</p>
            </a>
          </li>
          @elseif(auth()->user()->role == 'freelancer')

          <li class="nav-header">MANAGE PROFILE</li>
          <li class="nav-item">
            <a href="{{ URL::to('/profile/') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-header">MANAGE EMPLOYEER</li>
          <li class="nav-item">
            <a href="{{ route('hiring.employeer') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Employeer</p>
            </a>
          </li>

          @elseif(auth()->user()->role == 'employer')

          <li class="nav-header">MANAGE PROFILE</li>
          <li class="nav-item">
            <a href="{{ URL::to('/profile/') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-header">MANAGE FREELANCER</li>
          <li class="nav-item">
            <a href="{{ route('hiring.freelancer') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Freelancer</p>
            </a>
          </li>

          @endif

          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="nav-icon far fa fa-power-off"></i>
                    <p>Logout</p>
                </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
