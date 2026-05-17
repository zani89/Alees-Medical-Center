@props(['testimonial'])

<div class="card h-100 shadow-sm border-0 testimonial-card bg-white">
    <div class="card-body p-4">
        <div class="mb-3 text-warning">
            @for ($i = 1; $i <= 5; $i++)
                @if($i <= $testimonial->rating)
                    <i class="bi bi-star-fill"></i>
                @else
                    <i class="bi bi-star"></i>
                @endif
            @endfor
        </div>
        <p class="card-text text-muted fst-italic mb-4">"{{ $testimonial->quote }}"</p>
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0 fw-bold text-primary">{{ $testimonial->patient_name }}</h6>
                <small class="text-muted">{{ $testimonial->treatment_type }} Patient</small>
            </div>
        </div>
    </div>
</div>
