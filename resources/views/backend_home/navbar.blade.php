<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
        <h1 style="font-family: 'Poppins', sans-serif;" class="m-0 display-5">trabaho</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ route('admin.about') }}" class="nav-item nav-link {{ request()->routeIs('admin.about') ? 'active' : '' }}">About</a>
            <a href="{{ route('admin.developer') }}" class="nav-item nav-link {{ request()->routeIs('admin.developer') ? 'active' : '' }}">Developer</a>
            <a href="{{ route('admin.employer') }}" class="nav-item nav-link {{ request()->routeIs('admin.employer') ? 'active' : '' }}">Employer</a>
            <a href="{{ route('admin.contact') }}" class="nav-item nav-link {{ request()->routeIs('admin.contact') ? 'active' : '' }}">Contact</a>
            @if (!Auth::user())
                <a style="color:#14a800" href="{{ route('login') }}" class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            @elseif (auth()->user()->verified == 0)
                <a style="color:#14a800" href="#" class="nav-item nav-link">Verification</a>
            @else
                <a style="color:#14a800" href="/home" class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}">{{ auth()->user()->name }}</a>
            @endif
        </div>
    </div>
</nav>
<!-- Navbar End -->
