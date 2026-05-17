@extends('layouts.app')

@section('content')
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #0a5b78, #07869a);">
    <div class="container py-4">
        <h1 class="display-5 fw-bold text-white">Our Facilities</h1>
        <p class="lead text-white" style="opacity: 0.85;">State-of-the-art medical equipment and 24/7 care.</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @foreach($facilities as $facility)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm text-center facility-card">
                        <div class="card-body p-5">
                            <div class="mb-4" style="font-size: 3rem; color: #438e78;">
                                <i class="bi {{ $facility->icon ?? 'bi-building' }}"></i>
                            </div>
                            <h4 class="fw-bold text-primary mb-3">{{ $facility->name }}</h4>
                            <p class="text-muted">{{ $facility->description }}</p>
                            
                            @if(in_array($facility->name, ['NICU', 'ECG', 'Physiotherapy']))
                                <div class="mt-3">
                                    <span class="badge px-3 py-2 text-white" style="background-color: #438e78;">Featured Facility</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
