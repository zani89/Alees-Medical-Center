@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg position-relative overflow-hidden" style="padding-top: 120px; padding-bottom: 80px; min-height: 90vh; display: flex; align-items: center;">
    <div class="container position-relative z-1">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 text-white pe-lg-5">
                <span class="badge bg-white text-primary px-3 py-2 rounded-pill mb-4 fw-semibold shadow-sm">
                    <i class="bi bi-stars text-accent me-1"></i> Premium Healthcare
                </span>
                <h1 class="display-3 fw-bold mb-4 font-heading text-white" style="line-height: 1.1;">
                    Your Health, <br>
                    <span class="text-accent">Our Masterpiece.</span>
                </h1>
                <p class="lead mb-5 opacity-75" style="font-weight: 300;">
                    Experience world-class medical, dental, and aesthetic treatments in a state-of-the-art facility designed for your comfort and recovery.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('appointment.create') }}" class="btn btn-accent btn-lg rounded-pill px-5">
                        Book Consultation <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-5">
                        Explore Services
                    </a>
                </div>
                
                <div class="d-flex align-items-center mt-5 pt-3 border-top border-white border-opacity-25">
                    <div class="d-flex me-3">
                        <img src="https://ui-avatars.com/api/?name=Ali&background=0D8ABC&color=fff" class="rounded-circle border border-2 border-white shadow-sm" width="40" style="margin-left: -10px; position: relative; z-index: 3;" alt="Patient">
                        <img src="https://ui-avatars.com/api/?name=Sara&background=3AAEA5&color=fff" class="rounded-circle border border-2 border-white shadow-sm" width="40" style="margin-left: -15px; position: relative; z-index: 2;" alt="Patient">
                        <img src="https://ui-avatars.com/api/?name=Omar&background=1D3176&color=fff" class="rounded-circle border border-2 border-white shadow-sm" width="40" style="margin-left: -15px; position: relative; z-index: 1;" alt="Patient">
                    </div>
                    <div>
                        <div class="text-warning fs-6">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <small class="text-white opacity-75">Trusted by 10,000+ patients</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 position-relative">
                <div class="position-absolute bg-accent rounded-circle blur-3xl opacity-50" style="width: 400px; height: 400px; top: 10%; right: 10%; filter: blur(60px); z-index: 0;"></div>
                <img src="https://images.unsplash.com/photo-1581595220892-b0739db3ba8c?auto=format&fit=crop&w=800&q=80" alt="Hospital Building" class="img-fluid rounded-4 shadow-lg position-relative z-1" style="border: 8px solid rgba(255,255,255,0.1);">
                
                <!-- Floating Card -->
                <div class="position-absolute bottom-0 start-0 mb-4 ms-4 premium-card p-4 z-2 d-none d-md-block" style="width: 250px;">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-telephone-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block fw-bold">24/7 Emergency</small>
                            <span class="text-primary fw-bold">0341-5061201</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section with Glassmorphism -->
<section class="py-5" style="margin-top: -60px; position: relative; z-index: 10;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="premium-card text-center p-4 h-100">
                    <h2 class="display-5 font-heading gradient-text mb-0" data-target="50">0</h2>
                    <span class="text-primary fw-semibold">+</span>
                    <p class="text-muted fw-medium mt-2 mb-0">Expert Doctors</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-card text-center p-4 h-100">
                    <h2 class="display-5 font-heading gradient-text mb-0" data-target="15">0</h2>
                    <span class="text-primary fw-semibold">+</span>
                    <p class="text-muted fw-medium mt-2 mb-0">Specialties</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-card text-center p-4 h-100">
                    <h2 class="display-5 font-heading gradient-text mb-0" data-target="10000">0</h2>
                    <span class="text-primary fw-semibold">+</span>
                    <p class="text-muted fw-medium mt-2 mb-0">Happy Patients</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-card text-center p-4 h-100">
                    <h2 class="display-5 font-heading gradient-text mb-0" data-target="20">0</h2>
                    <span class="text-primary fw-semibold">+</span>
                    <p class="text-muted fw-medium mt-2 mb-0">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Departments Section -->
<section class="py-5 my-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-accent fw-bold text-uppercase tracking-wider">Centers of Excellence</span>
            <h2 class="display-5 mt-2 mb-3 font-heading">Our Departments</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">We provide comprehensive care across multiple disciplines, led by industry experts using advanced technology.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($departments as $dept)
                <div class="col">
                    <x-department-card :department="$dept" />
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('departments.index') }}" class="btn btn-outline-primary rounded-pill px-5 py-2 fw-semibold">View All Departments</a>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-5 position-relative overflow-hidden bg-primary text-white mt-5">
    <!-- Decorative SVG -->
    <svg class="position-absolute top-0 end-0 h-100 opacity-10" viewBox="0 0 100 100" preserveAspectRatio="none" style="width: 50%;">
        <path fill="currentColor" d="M0,0 C50,100 80,100 100,0 L100,100 L0,100 Z"></path>
    </svg>
    
    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h2 class="display-5 text-white mb-3 font-heading">Need Medical Assistance?</h2>
                <p class="lead opacity-75 mb-4">Our emergency and support teams are available 24/7 to provide immediate assistance.</p>
                <div class="d-flex flex-wrap gap-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-primary rounded-circle p-3 me-3 shadow-sm d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                            <i class="bi bi-telephone-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="d-block text-white-50">Emergency Line</small>
                            <span class="fs-4 fw-bold">0341-5061201</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-primary rounded-circle p-3 me-3 shadow-sm d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="d-block text-white-50">Location</small>
                            <span class="fs-5 fw-bold">G-15/2, Islamabad</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-lg-end">
                <div class="premium-card p-5 text-start shadow-lg border-0">
                    <h4 class="mb-3 text-primary font-heading">Send us a Message</h4>
                    <p class="text-muted mb-4 small">Skip the wait line and book your consultation directly through our portal.</p>
                    <a href="{{ route('appointment.create') }}" class="btn btn-primary w-100 rounded-pill py-3 mb-3 fw-bold">Schedule Now</a>
                    <a href="https://wa.me/923415061201" target="_blank" class="btn btn-success w-100 rounded-pill py-3 bg-gradient text-white border-0 fw-bold" style="background: linear-gradient(135deg, #25D366, #128C7E);">
                        <i class="bi bi-whatsapp me-2 fs-5"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Stats Counter Animation
    const counters = document.querySelectorAll('h2[data-target]');
    const speed = 200;

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace(/,/g, '');
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc).toLocaleString();
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            updateCount();
        });
    };

    // Intersection Observer to trigger animation when visible
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            animateCounters();
            observer.disconnect();
        }
    });

    if (counters.length > 0) {
        observer.observe(counters[0]);
    }
</script>
@endpush
