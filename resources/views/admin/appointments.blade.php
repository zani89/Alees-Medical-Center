@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Appointments</h2>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Patient</th>
                        <th>Contact</th>
                        <th>Date</th>
                        <th>Department/Service</th>
                        <th>Doctor</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appt)
                    <tr>
                        <td>#{{ $appt->id }}</td>
                        <td>
                            <strong>{{ $appt->patient_name }}</strong>
                        </td>
                        <td>
                            {{ $appt->phone }}<br>
                            <small class="text-muted">{{ $appt->email }}</small>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}</td>
                        <td>
                            {{ $appt->department->name }}<br>
                            <small class="text-muted">{{ $appt->service->name ?? '' }}</small>
                        </td>
                        <td>{{ $appt->doctor->name ?? 'Any' }}</td>
                        <td>
                            <span class="badge {{ $appt->status === 'confirmed' ? 'bg-success' : ($appt->status === 'cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucfirst($appt->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.appointments.update', $appt) }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm" style="width: auto;">
                                    <option value="pending" {{ $appt->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appt->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $appt->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No appointments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
