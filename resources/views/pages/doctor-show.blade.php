@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <img src="{{ $doctor->photo }}" alt="{{ $doctor->name }}" class="rounded-circle mx-auto mb-4 border border-4 border-white shadow" width="200" height="200" style="object-fit: cover;">
                    <h3 class="fw-bold text-primary">{{ $doctor->name }}</h3>
                    <p class="text-accent fs-5 mb-3">{{ $doctor->specialty }}</p>
                    <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">
                        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $doctor->department->name }}</span>
                        <span class="badge bg-secondary rounded-pill px-3 py-2">{{ $doctor->experience_years }} Years Exp</span>
                    </div>
                    <a href="{{ route('appointment.create', ['doctor' => $doctor->id]) }}" class="btn btn-primary btn-lg w-100 rounded-pill">Book Appointment</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <h4 class="fw-bold text-primary mb-4">About Doctor</h4>
                        <p class="lead text-muted mb-5">{{ $doctor->bio }}</p>

                        <h5 class="fw-bold text-primary mb-3">Qualifications</h5>
                        <ul class="list-group list-group-flush mb-5">
                            <li class="list-group-item px-0 text-muted"><i class="bi bi-check-circle-fill text-accent me-2"></i> {{ $doctor->qualifications }}</li>
                        </ul>

                        <h5 class="fw-bold text-primary mb-3">Working Hours</h5>
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div class="col">
                                <div class="p-3 border rounded bg-light">
                                    <h6 class="fw-bold mb-1">Monday - Friday</h6>
                                    <span class="text-muted">09:00 AM - 05:00 PM</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3 border rounded bg-light">
                                    <h6 class="fw-bold mb-1">Saturday</h6>
                                    <span class="text-muted">09:00 AM - 01:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
