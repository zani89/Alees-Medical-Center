@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden border-top border-4 border-primary">
                    <div class="card-header bg-white text-center py-5 border-0">
                        <h2 class="mb-2 fw-bold text-primary">Book an Appointment</h2>
                        <p class="text-muted mb-0">Experience world-class healthcare tailored to your needs</p>
                    </div>
                    <div class="card-body px-5 pb-5">
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('appointment.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_name" class="form-control form-control-lg bg-light border-0 @error('patient_name') is-invalid @enderror" value="{{ old('patient_name') }}" required>
                                    @error('patient_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control form-control-lg bg-light border-0 @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="e.g. 03001234567" required>
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-lg bg-light border-0 @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Preferred Date <span class="text-danger">*</span></label>
                                    <input type="date" name="preferred_date" class="form-control form-control-lg bg-light border-0 @error('preferred_date') is-invalid @enderror" value="{{ old('preferred_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                    @error('preferred_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Department <span class="text-danger">*</span></label>
                                    <select name="department_id" class="form-select form-select-lg bg-light border-0 @error('department_id') is-invalid @enderror" required>
                                        <option value="">Select Department</option>
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Doctor (Optional)</label>
                                    <select name="doctor_id" class="form-select form-select-lg bg-light border-0 @error('doctor_id') is-invalid @enderror">
                                        <option value="">Any Available Doctor</option>
                                        @foreach($doctors as $doc)
                                            <option value="{{ $doc->id }}" {{ (old('doctor_id') == $doc->id || $selectedDoctorId == $doc->id) ? 'selected' : '' }}>{{ $doc->name }} ({{ $doc->specialty }})</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">Service (Optional)</label>
                                    <select name="service_id" class="form-select form-select-lg bg-light border-0 @error('service_id') is-invalid @enderror">
                                        <option value="">Select Service</option>
                                        @foreach($services as $srv)
                                            <option value="{{ $srv->id }}" {{ old('service_id') == $srv->id ? 'selected' : '' }}>{{ $srv->name }} (Rs. {{ number_format($srv->fee, 0) }})</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold text-dark">Additional Message</label>
                                    <textarea name="message" rows="3" class="form-control form-control-lg bg-light border-0 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12 mt-5 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold w-100 py-3 shadow-lg">Confirm Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
