<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
        <h1 style="font-family: 'Jost', sans-serif;" class="m-0 display-5">trabaho</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div style="font-family: 'Jost', sans-serif;" class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{ route('admin.about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('admin.developer') }}" class="nav-item nav-link">Developer</a>
            <a href="{{ route('admin.employer') }}" class="nav-item nav-link">Employer</a>
            <a href="{{ route('admin.contact') }}" class="nav-item nav-link">Contact</a>
            @if (!Auth::user())
                <a style="color:#14a800" href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    @elseif (auth()->user()->verified == 0)
                        <a style="color:#14a800" href="#" class="nav-item nav-link">Verification</a>
                        @else
                        <a style="color:#14a800" href="/home" class="nav-item nav-link">{{ auth()->user()->name }}</a>
            @endif
        </div>
    </div>
</nav>
<!-- Navbar End -->
