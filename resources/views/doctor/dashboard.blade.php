@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Gradient Greeting Banner -->
    <div class="rounded-5 text-white p-5 mb-5 shadow-lg d-flex justify-content-between align-items-center flex-wrap gap-4 position-relative overflow-hidden" 
         style="background: linear-gradient(135deg, var(--color-navy), var(--color-royal));">
        <div class="position-absolute top-0 end-0 p-5 opacity-10" style="font-size: 8rem; pointer-events: none;">
            <i class="bi bi-person-workspace"></i>
        </div>
        <div class="position-relative z-1 d-flex align-items-center gap-4">
            <img src="{{ $doctor->photo }}" alt="{{ $doctor->name }}" class="rounded-circle border border-3 border-white shadow-sm" width="90" height="90" style="object-fit: cover;">
            <div>
                <span class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-20 rounded-pill px-3 py-1 mb-2 font-heading small">Doctor Account Active</span>
                <h1 class="display-6 fw-bold font-heading mb-1 text-white">Welcome Back, {{ $doctor->name }}</h1>
                <p class="mb-0 text-white-50"><i class="bi bi-briefcase me-1"></i>{{ $doctor->specialty }} | {{ $doctor->qualifications }}</p>
            </div>
        </div>
        <div class="bg-white bg-opacity-10 rounded-4 px-4 py-3 backdrop-blur shadow-inner text-center position-relative z-1 border border-white border-opacity-10">
            <span class="d-block text-white-50 small fw-bold">EXPERIENCE RATING</span>
            <span class="h2 fw-bold font-heading text-white">{{ $doctor->experience_years }}+ Years</span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        <!-- Total Patients -->
        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(10, 91, 120, 0.1) !important; color: var(--color-navy) !important;">
                    <i class="bi bi-people-fill fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Assigned Bookings</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['total'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Pending Bookings -->
        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 text-warning rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(245, 158, 11, 0.1) !important; color: #d97706 !important;">
                    <i class="bi bi-clock-history fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Pending Approvals</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['pending'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Confirmed Sessions -->
        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-success bg-opacity-10 text-success rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(67, 142, 120, 0.1) !important; color: var(--color-teal) !important;">
                    <i class="bi bi-check-circle-fill fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Confirmed Schedules</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['confirmed'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment schedule -->
    <div class="premium-card p-4">
        <h4 class="font-heading fw-bold text-primary mb-4"><i class="bi bi-calendar-range me-2"></i>Your Appointment Schedule</h4>
        
        @if(session('success'))
            <div class="alert alert-success border-0 rounded-3 shadow-sm py-3 px-4 mb-4" style="background-color: #f0fdf4; color: #166534;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Patient Name</th>
                        <th>Contact Email / Phone</th>
                        <th>Preferred Schedule</th>
                        <th>Requested Service</th>
                        <th>Status</th>
                        <th class="text-end">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appt)
                    <tr>
                        <td>
                            <h6 class="fw-bold mb-0 text-dark">{{ $appt->patient_name }}</h6>
                        </td>
                        <td>
                            <div class="small fw-semibold text-secondary"><i class="bi bi-envelope me-1"></i>{{ $appt->email }}</div>
                            <div class="small text-muted"><i class="bi bi-telephone-fill me-1"></i>{{ $appt->phone }}</div>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small"><i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 small fw-semibold">
                                {{ $appt->service->name ?? 'General Consultation' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $appt->status === 'confirmed' ? 'bg-success' : ($appt->status === 'cancelled' ? 'bg-danger' : 'bg-warning') }} bg-opacity-10 {{ $appt->status === 'confirmed' ? 'text-success' : ($appt->status === 'cancelled' ? 'text-danger' : 'text-warning') }} border border-opacity-10 rounded-pill px-3 py-1">
                                {{ ucfirst($appt->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('doctor.appointments.update', $appt) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm rounded-3 py-1" style="width: auto; font-size: 0.8rem;">
                                    <option value="pending" {{ $appt->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appt->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="cancelled" {{ $appt->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary rounded-3 px-2 py-1"><i class="bi bi-check-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No appointments are currently assigned to you.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
