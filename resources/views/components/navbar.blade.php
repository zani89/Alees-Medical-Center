<nav class="navbar navbar-expand-lg fixed-top w-100 z-3">
    <div class="container">
        <a class="navbar-brand font-heading d-flex align-items-center" href="{{ route('home') }}">
            <div class="bg-accent text-white rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px;">
                <i class="bi bi-hospital fs-5"></i>
            </div>
            Alees Medical
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list fs-2 text-primary"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">Departments</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('facilities.*') ? 'active' : '' }}" href="{{ route('facilities.index') }}">Facilities</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('doctors.*') ? 'active' : '' }}" href="{{ route('doctors.index') }}">Doctors</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
                </li>
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item mx-1">
                            <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin Portal</a>
                        </li>
                    @elseif(Auth::user()->role === 'doctor')
                        <li class="nav-item mx-1">
                            <a class="nav-link {{ request()->is('doctor*') ? 'active' : '' }}" href="{{ route('doctor.dashboard') }}">Doctor Portal</a>
                        </li>
                    @elseif(Auth::user()->role === 'receptionist')
                        <li class="nav-item mx-1">
                            <a class="nav-link {{ request()->is('receptionist*') ? 'active' : '' }}" href="{{ route('receptionist.dashboard') }}">Receptionist Portal</a>
                        </li>
                    @else
                        <li class="nav-item mx-1">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">My Schedule</a>
                        </li>
                    @endif
                    <li class="nav-item mx-1">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link border-0 bg-transparent" style="cursor: pointer;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item mx-1">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
            <div class="d-flex ms-lg-4 mt-3 mt-lg-0">
                <a href="{{ route('appointment.create') }}" class="btn btn-accent rounded-pill px-4 py-2 fw-semibold">Book Appointment</a>
            </div>
        </div>
    </div>
</nav>
