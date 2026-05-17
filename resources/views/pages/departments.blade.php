@extends('layouts.app')

@section('content')
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-4">
        <h1 class="display-5 fw-bold">Centers of Excellence</h1>
        <p class="lead">Comprehensive care across various medical disciplines.</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @foreach ($departments as $department)
                <div class="col">
                    <x-department-card :department="$department" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
