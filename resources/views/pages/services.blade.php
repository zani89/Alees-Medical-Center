@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg position-relative overflow-hidden py-5 text-white text-center" style="margin-top: 80px;">
    <div class="container py-4 position-relative z-1">
        <h1 class="display-4 font-heading text-white mb-3">Our Services</h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Premium healthcare and aesthetic services designed for you.</p>
    </div>
</section>

<section class="py-5" style="margin-top: -60px; position: relative; z-index: 10;">
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @foreach($services as $service)
                <div class="col">
                    <div class="premium-card h-100 p-5 d-flex flex-column text-start">
                        <div class="mb-4 d-inline-flex align-items-center justify-content-center bg-accent text-white rounded-4 shadow-sm" style="width: 60px; height: 60px;">
                            <i class="bi {{ empty($service->icon) ? 'bi-check2-circle' : (str_starts_with($service->icon, 'bi-') ? $service->icon : 'bi-'.$service->icon) }} fs-3"></i>
                        </div>
                        <h4 class="font-heading text-primary mb-3">{{ $service->name }}</h4>
                        <p class="text-muted mb-4 flex-grow-1" style="line-height: 1.6;">{{ $service->description }}</p>
                        
                        <div class="mt-auto border-top pt-4">
                            <div class="d-flex justify-content-between align-items-end mb-3">
                                <div>
                                    <small class="text-muted d-block mb-1">Department</small>
                                    <span class="badge bg-light text-secondary border rounded-pill px-3">{{ $service->department }}</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block mb-1">Fee</small>
                                    <span class="fs-5 text-accent fw-bold">Rs. {{ number_format($service->fee, 0) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5 pt-3">
            <a href="{{ route('appointment.create') }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow-lg">Book a Service</a>
        </div>
    </div>
</section>
@endsection
