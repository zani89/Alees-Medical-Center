@extends('admin.layout')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1 class="font-heading fw-bold text-primary mb-2">Doctor Management</h1>
        <p class="text-muted mb-0">Register new clinical specialists and manage their profiles and system logins.</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 py-2" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
        <i class="bi bi-person-plus-fill me-2"></i>Add New Doctor
    </button>
</div>

<!-- Errors display -->
@if ($errors->any())
    <div class="alert alert-danger border-0 rounded-4 shadow-sm p-4 mb-4" style="background-color: #fef2f2; color: #991b1b;">
        <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please resolve the following:</h6>
        <ul class="mb-0 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Doctor Table -->
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Doctor Details</th>
                    <th>Specialty</th>
                    <th>Qualifications</th>
                    <th>Email (System Login)</th>
                    <th>Phone</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doc)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $doc->photo }}" alt="{{ $doc->name }}" class="rounded-circle me-3 border" width="45" height="45" style="object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $doc->name }}</h6>
                                <small class="text-muted">{{ $doc->experience_years }} Years Exp</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge rounded-pill px-3 py-1 fw-bold" style="background-color: rgba(67, 142, 120, 0.12); color: #2d6a5a; border: 1px solid rgba(67, 142, 120, 0.2);">
                            {{ $doc->specialty }}
                        </span>
                    </td>
                    <td>
                        <small class="fw-semibold text-secondary">{{ $doc->qualifications }}</small>
                    </td>
                    <td>
                        <code class="text-primary fw-bold" style="font-size: 0.85rem;">{{ $doc->email ?? 'N/A' }}</code>
                    </td>
                    <td>
                        <small class="text-muted">{{ $doc->phone }}</small>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.doctors.destroy', $doc) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this doctor profile and revoke their system login?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2" title="Delete Profile"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No clinical specialists registered yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 text-white p-4" style="background: linear-gradient(135deg, var(--color-navy), var(--color-royal));">
                <h5 class="modal-title font-heading fw-bold" id="exampleModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Add Clinical Specialist</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.doctors.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Full Name</label>
                            <input type="text" name="name" class="form-control rounded-3" placeholder="e.g. Dr. Salman Ahmed" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Email (Login ID)</label>
                            <input type="email" name="email" class="form-control rounded-3" placeholder="e.g. dr.salman@aleesmedical.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Specialty Area</label>
                            <input type="text" name="specialty" class="form-control rounded-3" placeholder="e.g. Cardiologist" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Qualifications</label>
                            <input type="text" name="qualifications" class="form-control rounded-3" placeholder="e.g. MBBS, FCPS" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Contact Phone</label>
                            <input type="text" name="phone" class="form-control rounded-3" placeholder="e.g. 0341-5061201" required>
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
                            <label class="form-label fw-semibold text-dark small">Experience Years</label>
                            <input type="number" name="experience_years" class="form-control rounded-3" min="0" placeholder="e.g. 10" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Login Password</label>
                            <input type="password" name="password" class="form-control rounded-3" placeholder="Minimum 6 characters" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark small">Biography & Roster Duty Bio</label>
                            <textarea name="bio" class="form-control rounded-3" rows="3" placeholder="Brief statement about doctor expertise..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-light">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Register Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
