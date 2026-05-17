<style>
    .footer-custom-text, .footer-custom-text a {
        color: #eff5f6 !important;
        text-decoration: none;
    }
    .footer-custom-text a:hover {
        color: #ffffff !important;
    }
</style>
<footer class="bg-primary footer-custom-text pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <h4 class="text-white mb-3"><i class="bi bi-hospital text-accent me-2"></i> Alees Medical, Dental & Aesthetic Center</h4>
                <p class="footer-custom-text">Providing world-class healthcare with compassion and excellence. Your health is our priority.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light fs-5"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light fs-5"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <h5 class="text-white mb-3">Quick Links</h5>
                <ul class="list-unstyled footer-custom-text">
                    <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                    <li class="mb-2"><a href="{{ route('departments.index') }}">Departments</a></li>
                    <li class="mb-2"><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="mb-2"><a href="{{ route('facilities.index') }}">Facilities</a></li>
                    <li class="mb-2"><a href="{{ route('doctors.index') }}">Doctors</a></li>
                    <li class="mb-2"><a href="{{ route('contact.index') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="text-white mb-3">Services</h5>
                <ul class="list-unstyled footer-custom-text">
                    <li class="mb-2"><a href="{{ route('services.index') }}">General Medicine</a></li>
                    <li class="mb-2"><a href="{{ route('services.index') }}">Dentistry</a></li>
                    <li class="mb-2"><a href="{{ route('services.index') }}">Aesthetic Treatments</a></li>
                    <li class="mb-2"><a href="{{ route('appointment.create') }}">Patient Portal</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white mb-3">Contact Info</h5>
                <ul class="list-unstyled footer-custom-text">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2 text-accent"></i> House #233, Main Double Road, G-15/2, Opposite Society Office, Islamabad<br><i class="bi bi-geo-alt me-2 text-transparent"></i> H #153, Street #1, G-15/1, Islamabad</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2 text-accent"></i> 0341-5061201<br><i class="bi bi-telephone me-2 text-transparent"></i> 0331-1400626</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2 text-accent"></i> info@aleesmedical.com</li>
                </ul>
            </div>
        </div>
        <hr class="border-light mt-4 mb-3" style="opacity: 0.2;">
        <div class="text-center footer-custom-text small">
            &copy; {{ date('Y') }} Alees Medical, Dental & Aesthetic Center. All rights reserved.
        </div>
    </div>
</footer>
