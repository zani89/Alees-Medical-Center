<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alees Medical, Dental & Aesthetic Center</title>
    <meta name="description" content="Alees Medical Center provides top-notch healthcare services. Book your appointment today.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --color-navy: #0a5b78;
            --color-royal: #07869a;
            --color-steel: #79afb3;
            --color-teal: #438e78;
            --bg-light: #eff5f6;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.4);
            --shadow-soft: 0 10px 30px rgba(10, 91, 120, 0.08);
            --shadow-hover: 0 20px 40px rgba(7, 134, 154, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #4a5568;
            background-color: var(--bg-light);
            -webkit-font-smoothing: antialiased;
            padding-top: 95px; /* Offset fixed-top glass navbar */
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: var(--color-navy);
            letter-spacing: -0.02em;
        }

        .text-primary { color: var(--color-royal) !important; }
        .text-accent { color: var(--color-teal) !important; }
        .bg-primary { background-color: var(--color-navy) !important; }
        .bg-accent { background-color: var(--color-teal) !important; }

        /* Premium Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--color-royal), var(--color-navy));
            border: none;
            box-shadow: 0 4px 15px rgba(29, 49, 118, 0.3);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-weight: 500;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(29, 49, 118, 0.4);
            background: linear-gradient(135deg, var(--color-steel), var(--color-royal));
        }

        .btn-accent {
            background: linear-gradient(135deg, #4adbc0, var(--color-teal));
            border: none;
            box-shadow: 0 4px 15px rgba(58, 174, 165, 0.3);
            color: white !important;
            transition: all 0.3s ease;
        }
        .btn-accent:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(58, 174, 165, 0.4);
            background: linear-gradient(135deg, #5df3d6, #4adbc0);
        }

        /* Glass Navbar */
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            box-shadow: var(--shadow-soft);
            padding: 0.8rem 0;
            transition: all 0.4s ease;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            color: var(--color-navy) !important;
        }
        .nav-link {
            color: var(--color-royal) !important;
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--color-teal) !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--color-teal);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* Dynamic Cards */
        .premium-card {
            background: white;
            border-radius: 1.25rem;
            border: 1px solid rgba(0,0,0,0.03);
            box-shadow: var(--shadow-soft);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
            position: relative;
        }
        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        /* Custom Gradients & Utilities */
        .gradient-text {
            background: linear-gradient(135deg, var(--color-royal), var(--color-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-bg {
            background: linear-gradient(135deg, var(--color-navy), var(--color-royal));
            position: relative;
            overflow: hidden;
        }
        .gradient-bg::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(58,174,165,0.15) 0%, transparent 60%);
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1.25rem;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 4px rgba(58, 174, 165, 0.15);
            border-color: var(--color-teal);
        }
    </style>
</head>
<body>
    
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sticky navbar on scroll
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Form Validation
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
                }, false)
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
