<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Alees Medical Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-navy: #0a5b78;
            --color-royal: #07869a;
            --color-steel: #79afb3;
            --color-teal: #438e78;
            --bg-light: #eff5f6;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
        }
        .font-heading {
            font-family: 'Outfit', sans-serif;
        }
        .navbar-brand-custom {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: #ffffff !important;
        }
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            transition: all 0.3s;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: #ffffff !important;
            text-shadow: 0 0 10px rgba(255,255,255,0.3);
        }
        .admin-navbar {
            background: linear-gradient(135deg, var(--color-navy), var(--color-royal)) !important;
            box-shadow: 0 4px 20px rgba(10, 91, 120, 0.15);
        }
        .premium-card {
            background: #ffffff;
            border-radius: 16px;
            border: 0;
            box-shadow: 0 10px 30px rgba(10, 91, 120, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(7, 134, 154, 0.1);
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar py-3">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 35px; height: 35px; color: var(--color-navy) !important;">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                Alees Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}" href="{{ route('admin.appointments.index') }}">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}" href="{{ route('admin.doctors.index') }}">Manage Doctors</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center text-white gap-3">
                    <span class="fw-semibold"><i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light rounded-pill px-3">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm p-4 mb-4" role="alert" style="background-color: #f0fdf4; color: #166534;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
