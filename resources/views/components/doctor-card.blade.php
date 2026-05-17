@props(['doctor'])

<div class="premium-card h-100 position-relative overflow-hidden">
    <!-- Accent Top Banner -->
    <div class="bg-primary position-absolute top-0 w-100" style="height: 80px; z-index: 0;"></div>
    
    <div class="card-body text-center p-4 position-relative z-1 pt-5">
        <div class="mb-4">
            <img src="{{ $doctor->photo }}" alt="{{ $doctor->name }}" class="rounded-circle border border-4 border-white shadow" width="120" height="120" style="object-fit: cover; background: #fff;">
        </div>
        <h5 class="font-heading text-primary mb-1">{{ $doctor->name }}</h5>
        <p class="text-accent fw-medium mb-3">{{ $doctor->specialty }}</p>
        
        <div class="d-flex justify-content-center gap-2 mb-4 flex-wrap">
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">{{ $doctor->qualifications }}</span>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">{{ $doctor->experience_years }} Yrs Exp</span>
        </div>
        
        @if($doctor->phone)
            <div class="bg-light rounded-3 p-2 mb-4 d-inline-flex align-items-center">
                <i class="bi bi-telephone-fill text-accent me-2"></i>
                <span class="fw-semibold text-dark">{{ $doctor->phone }}</span>
            </div>
        @endif
        
        <a href="{{ route('appointment.create', ['doctor' => $doctor->id]) }}" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-semibold transition-all">Book Consultation</a>
    </div>
</div>
