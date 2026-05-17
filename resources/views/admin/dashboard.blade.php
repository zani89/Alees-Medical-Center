@extends('admin.layout')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1 class="font-heading fw-bold text-primary mb-2">Welcome Back, Admin</h1>
        <p class="text-muted mb-0">Here is your clinic's operational performance summary and real-time scheduling metrics.</p>
    </div>
    <div class="bg-white rounded-pill px-4 py-2 border shadow-sm d-flex align-items-center gap-2">
        <span class="h-3 w-3 bg-success rounded-circle d-inline-block" style="width: 10px; height: 10px;"></span>
        <span class="fw-semibold text-secondary small">System Operational</span>
    </div>
</div>

<!-- Core Counter Statistics -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Appointments Count -->
    <div class="col">
        <div class="premium-card p-4 h-100 d-flex align-items-center">
            <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; background-color: rgba(10, 91, 120, 0.1) !important; color: var(--color-navy) !important;">
                <i class="bi bi-calendar-check fs-2"></i>
            </div>
            <div>
                <span class="text-muted small d-block fw-medium">Total Bookings</span>
                <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['total_appointments'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Active Doctors -->
    <div class="col">
        <div class="premium-card p-4 h-100 d-flex align-items-center">
            <div class="bg-success bg-opacity-10 text-success rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; background-color: rgba(67, 142, 120, 0.1) !important; color: var(--color-teal) !important;">
                <i class="bi bi-people fs-2"></i>
            </div>
            <div>
                <span class="text-muted small d-block fw-medium">Total Doctors</span>
                <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['total_doctors'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Unique Patients -->
    <div class="col">
        <div class="premium-card p-4 h-100 d-flex align-items-center">
            <div class="bg-info bg-opacity-10 text-info rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; background-color: rgba(121, 175, 179, 0.1) !important; color: var(--color-steel) !important;">
                <i class="bi bi-person-heart fs-2"></i>
            </div>
            <div>
                <span class="text-muted small d-block fw-medium">Unique Patients</span>
                <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['total_patients'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Estimated Revenue -->
    <div class="col">
        <div class="premium-card p-4 h-100 d-flex align-items-center">
            <div class="bg-warning bg-opacity-10 text-warning rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; background-color: rgba(245, 158, 11, 0.1) !important; color: #d97706 !important;">
                <i class="bi bi-cash-stack fs-2"></i>
            </div>
            <div>
                <span class="text-muted small d-block fw-medium">Confirmed Revenue</span>
                <h3 class="fw-bold font-heading text-dark mb-0">Rs. {{ number_format($stats['estimated_revenue'], 0) }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Booking Status Breakdown Cards -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <!-- Pending Card -->
    <div class="col">
        <div class="premium-card p-4 border-start border-4 border-warning h-100 d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small d-block fw-semibold text-uppercase tracking-wider">Pending Approvals</span>
                <h4 class="fw-bold font-heading mb-0 text-dark mt-1">{{ $stats['pending_appointments'] }}</h4>
            </div>
            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1.5 fw-bold">Action Needed</span>
        </div>
    </div>

    <!-- Confirmed Card -->
    <div class="col">
        <div class="premium-card p-4 border-start border-4 border-success h-100 d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small d-block fw-semibold text-uppercase tracking-wider">Confirmed Schedules</span>
                <h4 class="fw-bold font-heading mb-0 text-dark mt-1">{{ $stats['confirmed_appointments'] }}</h4>
            </div>
            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1.5 fw-bold">Active</span>
        </div>
    </div>

    <!-- Cancelled Card -->
    <div class="col">
        <div class="premium-card p-4 border-start border-4 border-danger h-100 d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small d-block fw-semibold text-uppercase tracking-wider">Cancelled Requests</span>
                <h4 class="fw-bold font-heading mb-0 text-dark mt-1">{{ $stats['cancelled_appointments'] }}</h4>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1.5 fw-bold">Archived</span>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Appointments Board with Instant Controls -->
    <div class="col-lg-8">
        <div class="premium-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h4 class="font-heading fw-bold text-primary mb-0"><i class="bi bi-clock-history me-2"></i>Recent Booking Requests</h4>
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">View All Bookings</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Patient</th>
                            <th>Preferred Date</th>
                            <th>Doctor / Service</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_appointments as $appt)
                        <tr>
                            <td>
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark">{{ $appt->patient_name }}</h6>
                                    <small class="text-muted d-block"><i class="bi bi-telephone-fill small me-1"></i>{{ $appt->phone }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold text-secondary small">
                                    <i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}
                                </div>
                            </td>
                            <td>
                                <div class="small fw-semibold text-dark">{{ $appt->doctor->name ?? 'Any Doctor' }}</div>
                                <div class="text-muted small">{{ $appt->service->name ?? 'General Consultation' }}</div>
                            </td>
                            <td>
                                <span class="badge {{ $appt->status === 'confirmed' ? 'bg-success' : ($appt->status === 'cancelled' ? 'bg-danger' : 'bg-warning') }} bg-opacity-10 {{ $appt->status === 'confirmed' ? 'text-success' : ($appt->status === 'cancelled' ? 'text-danger' : 'text-warning') }} border border-opacity-10 rounded-pill px-3 py-1">
                                    {{ ucfirst($appt->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.appointments.update', $appt) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
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
                            <td colspan="5" class="text-center py-4 text-muted">No booking requests found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Doctor Management Directory (With Contact details only for Admin) -->
    <div class="col-lg-4">
        <div class="premium-card p-4">
            <h4 class="font-heading fw-bold text-primary mb-4"><i class="bi bi-person-badge me-2"></i>Doctor Directory</h4>
            <div class="d-flex flex-column gap-3" style="max-height: 480px; overflow-y: auto; padding-right: 5px;">
                @forelse($doctors as $doc)
                <div class="d-flex align-items-center justify-content-between p-3 rounded-4 bg-light">
                    <div class="d-flex align-items-center">
                        <img src="{{ $doc->photo }}" alt="{{ $doc->name }}" class="rounded-circle me-3" width="45" height="45" style="object-fit: cover; background: #fff;">
                        <div>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">{{ $doc->name }}</h6>
                            <small class="fw-medium d-block" style="font-size: 0.8rem; color: #2d6a5a;">{{ $doc->specialty }}</small>
                            @if($doc->phone)
                                <small class="text-muted d-block" style="font-size: 0.75rem;"><i class="bi bi-telephone-fill me-1"></i>{{ $doc->phone }}</small>
                            @endif
                        </div>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 rounded-pill px-2 py-1 small" style="font-size: 0.7rem;">Active</span>
                </div>
                @empty
                <p class="text-muted text-center py-3">No registered doctors found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
