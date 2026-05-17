@extends('layouts.app')

@section('content')
<!-- Include the same contact section from home page but with a header -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-4">
        <h1 class="display-5 fw-bold">Contact Us</h1>
        <p class="lead">We're here to help and answer any questions you might have.</p>
    </div>
</section>

<!-- Re-use the contact section from home.blade.php here, or simply include it -->
<section class="py-5">
    <div class="container py-4">
        <div class="row gy-5 bg-white shadow-sm rounded overflow-hidden">
            <div class="col-lg-5 bg-primary text-white p-5">
                <h3 class="mb-4 text-white fw-bold">Get in Touch</h3>
                <div class="d-flex mb-4">
                    <i class="bi bi-geo-alt fs-3 me-3 text-accent"></i>
                    <div>
                        <h5 class="mb-1 text-white">Location</h5>
                        <p class="mb-0 text-white-50">House #233, Main Double Road, G-15/2, Opposite Society Office, Islamabad<br>H #153, Street #1, G-15/1, Islamabad</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <i class="bi bi-telephone fs-3 me-3 text-accent"></i>
                    <div>
                        <h5 class="mb-1 text-white">Contact</h5>
                        <p class="mb-0 text-white-50">0341-5061201<br>0331-1400626<br>info@aleesmedical.com</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <i class="bi bi-clock fs-3 me-3 text-accent"></i>
                    <div>
                        <h5 class="mb-1 text-white">Hours</h5>
                        <p class="mb-0 text-white-50">Mon - Sat: 8:00 AM - 8:00 PM<br>Emergency: 24/7</p>
                    </div>
                </div>
                <a href="https://wa.me/923415061201" target="_blank" class="btn btn-accent bg-accent text-white rounded-pill px-4 mt-3 w-100">
                    <i class="bi bi-whatsapp me-2"></i> Chat on WhatsApp
                </a>
            </div>
            <div class="col-lg-7 p-5">
                <h3 class="mb-4 text-primary fw-bold">Send us a Message</h3>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
