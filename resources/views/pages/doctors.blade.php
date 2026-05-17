@extends('layouts.app')

@section('content')
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #0a5b78, #07869a);">
    <div class="container py-4">
        <h1 class="display-5 fw-bold text-white">Our Medical Specialists</h1>
        <p class="lead text-white" style="opacity: 0.85;">Dedicated to providing the best healthcare services.</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @foreach ($doctors as $doctor)
                <div class="col">
                    <x-doctor-card :doctor="$doctor" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
