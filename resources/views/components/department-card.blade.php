@props(['department'])

<div class="premium-card h-100 text-center text-md-start">
    <div class="card-body p-5 d-flex flex-column">
        <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-4 shadow-sm text-white" style="width: 70px; height: 70px; background-color: #438e78;">
            <i class="bi {{ empty($department->icon) ? 'bi-heart-pulse' : (str_starts_with($department->icon, 'bi-') ? $department->icon : 'bi-'.$department->icon) }} fs-1"></i>
        </div>
        <h4 class="font-heading text-primary mb-3">{{ $department->name }}</h4>
        <p class="text-muted flex-grow-1 mb-4" style="line-height: 1.6;">{{ Str::limit($department->description, 100) }}</p>
        <div class="mt-auto pt-3 border-top">
            <a href="{{ route('departments.show', $department->slug) }}" class="text-decoration-none fw-semibold d-flex align-items-center justify-content-between" style="color: #2d6a5a;">
                Explore Department
                <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>
