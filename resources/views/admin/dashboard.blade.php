@extends('admin.layout')

@section('content')
<h2 class="mb-4">Admin Dashboard</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <h5 class="card-title">Total Appointments</h5>
                <h2 class="display-4">{{ $stats['appointments'] }}</h2>
            </div>
            <div class="card-footer bg-transparent border-white">
                <a href="{{ route('admin.appointments.index') }}" class="text-white text-decoration-none">View All <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <h5 class="card-title">Total Doctors</h5>
                <h2 class="display-4">{{ $stats['doctors'] }}</h2>
            </div>
            <div class="card-footer bg-transparent border-white">
                <a href="#" class="text-white text-decoration-none">View All <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <h5 class="card-title">Departments</h5>
                <h2 class="display-4">{{ $stats['departments'] }}</h2>
            </div>
            <div class="card-footer bg-transparent border-white">
                <a href="#" class="text-white text-decoration-none">View All <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
