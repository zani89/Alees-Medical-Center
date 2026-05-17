@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-5 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h1 class="font-heading fw-bold text-primary mb-2">Receptionist Dashboard</h1>
            <p class="text-muted mb-0">Manage clinical booking queues, register walk-in patients, and handle schedule confirmations.</p>
        </div>
        <button class="btn btn-primary rounded-pill px-4 py-2" data-bs-toggle="modal" data-bs-target="#walkinModal">
            <i class="bi bi-person-plus-fill me-2"></i>Register Walk-In Patient
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(10, 91, 120, 0.1) !important; color: var(--color-navy) !important;">
                    <i class="bi bi-calendar2-range fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Total Queue</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['total'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 text-warning rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(245, 158, 11, 0.1) !important; color: #d97706 !important;">
                    <i class="bi bi-clock-history fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Pending Action</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['pending'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-success bg-opacity-10 text-success rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(67, 142, 120, 0.1) !important; color: var(--color-teal) !important;">
                    <i class="bi bi-check-circle-fill fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Confirmed Setup</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['confirmed'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="premium-card p-4 h-100 d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 text-danger rounded-4 p-3 d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px; background-color: rgba(220, 38, 38, 0.1) !important; color: #dc2626 !important;">
                    <i class="bi bi-x-circle-fill fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Cancelled Setup</span>
                    <h3 class="fw-bold font-heading text-dark mb-0">{{ $stats['cancelled'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Requests table -->
    <div class="premium-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h4 class="font-heading fw-bold text-primary mb-0"><i class="bi bi-list-stars me-2"></i>Global Clinic Bookings Queue</h4>
            <span class="badge bg-light text-secondary border rounded-pill px-3 py-2">Front Desk Live View</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 rounded-3 shadow-sm py-3 px-4 mb-4" style="background-color: #f0fdf4; color: #166534;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Patient Details</th>
                        <th>Preferred Schedule</th>
                        <th>Assigned Doctor / Specialty</th>
                        <th>Service / Fee</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appt)
                    <tr>
                        <td>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $appt->patient_name }}</h6>
                                <small class="text-muted d-block"><i class="bi bi-telephone-fill small me-1"></i>{{ $appt->phone }}</small>
                                <small class="text-muted d-block" style="font-size: 0.75rem;"><i class="bi bi-envelope small me-1"></i>{{ $appt->email }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-secondary small">
                                <i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}
                            </div>
                        </td>
                        <td>
                            <div class="small fw-bold text-dark">{{ $appt->doctor->name ?? 'Any Doctor' }}</div>
                            <div class="small fw-medium" style="font-size: 0.8rem; color: #2d6a5a;">{{ $appt->doctor->specialty ?? 'Consultant' }}</div>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">{{ $appt->service->name ?? 'General Consultation' }}</div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Rs. {{ number_format($appt->service->fee ?? 1500, 0) }}</div>
                        </td>
                        <td>
                            <span class="badge {{ $appt->status === 'confirmed' ? 'bg-success' : ($appt->status === 'cancelled' ? 'bg-danger' : 'bg-warning') }} bg-opacity-10 {{ $appt->status === 'confirmed' ? 'text-success' : ($appt->status === 'cancelled' ? 'text-danger' : 'text-warning') }} border border-opacity-10 rounded-pill px-3 py-1">
                                {{ ucfirst($appt->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('receptionist.appointments.update', $appt) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
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
                        <td colspan="6" class="text-center py-5 text-muted">No appointments found in the queue.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Walk-In Patient Modal -->
<div class="modal fade" id="walkinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 text-white p-4" style="background: linear-gradient(135deg, var(--color-navy), var(--color-royal));">
                <h5 class="modal-title font-heading fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Register Walk-In Patient</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('receptionist.appointments.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Patient Name</label>
                            <input type="text" name="patient_name" class="form-control rounded-3" placeholder="e.g. Asma Bibi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Email Address</label>
                            <input type="email" name="email" class="form-control rounded-3" placeholder="e.g. asma@gmail.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Contact Phone</label>
                            <input type="text" name="phone" class="form-control rounded-3" placeholder="e.g. 0341-5061201" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Preferred Date</label>
                            <input type="date" name="preferred_date" class="form-control rounded-3" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Clinical Department</label>
                            <select name="department_id" class="form-select rounded-3" required>
                                <option value="" disabled selected>Select Department</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Doctor Specialist</label>
                            <select name="doctor_id" class="form-select rounded-3" required>
                                <option value="" disabled selected>Select Doctor</option>
                                @foreach($doctors as $doc)
                                    <option value="{{ $doc->id }}">{{ $doc->name }} ({{ $doc->specialty }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Clinical Service</label>
                            <select name="service_id" class="form-select rounded-3" required>
                                <option value="" disabled selected>Select Service</option>
                                @foreach($services as $serv)
                                    <option value="{{ $serv->id }}">{{ $serv->name }} - Rs. {{ number_format($serv->fee, 0) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark small">Reception Notes</label>
                            <textarea name="message" class="form-control rounded-3" rows="3" placeholder="Brief check-in statement or clinical symptoms..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-light">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Confirm Walk-In</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
