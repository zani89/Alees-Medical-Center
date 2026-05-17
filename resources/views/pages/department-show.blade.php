@extends('layouts.app')

@section('content')
<section class="py-5 bg-primary text-white">
    <div class="container py-4 text-center">
        <div class="display-3 mb-3 text-accent"><i class="bi {{ $department->icon ?? 'bi-hospital' }}"></i></div>
        <h1 class="display-4 fw-bold">{{ $department->name }}</h1>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h3 class="fw-bold text-primary mb-4">Overview</h3>
                <p class="lead text-muted">{{ $department->description }}</p>
            </div>
        </div>

        <div class="mb-5 text-center">
            <h3 class="fw-bold text-primary mb-4">Our Specialists in {{ $department->name }}</h3>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @forelse ($department->doctors as $doctor)
                <div class="col">
                    <x-doctor-card :doctor="$doctor" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No doctors assigned to this department yet.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('appointment.create', ['department' => $department->id]) }}" class="btn btn-primary btn-lg rounded-pill px-5">Book Appointment in {{ $department->name }}</a>
        </div>
    </div>
</section>
@endsection
