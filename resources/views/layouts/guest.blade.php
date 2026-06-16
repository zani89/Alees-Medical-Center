<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Alees Medical Center') }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;500;700;800&display=swap" rel="stylesheet">

        <!-- Bootstrap Icons (for indicators) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .font-heading {
                font-family: 'Outfit', sans-serif;
            }
            .font-body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="font-body text-slate-800 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col lg:flex-row">
            
            <!-- Left Pane: Brand presentation (hidden on mobile/tablet) -->
            <div class="hidden lg:flex lg:w-7/12 relative items-center justify-center p-12 overflow-hidden" style="background: linear-gradient(135deg, #0a5b78, #07869a);">
                <!-- Decorative background elements -->
                <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-teal-400 opacity-20 blur-3xl"></div>
                <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full bg-blue-300 opacity-25 blur-3xl"></div>
                
                <div class="relative max-w-lg z-10 text-white">
                    <div class="mb-8">
                        <a href="/" class="inline-flex items-center gap-3 bg-white bg-opacity-10 backdrop-blur-md px-4 py-2 rounded-full border border-white border-opacity-20 text-white font-semibold hover:bg-opacity-20 transition">
                            <i class="bi bi-arrow-left"></i>
                            Back to website
                        </a>
                    </div>
                    
                    <h1 class="text-4xl font-extrabold tracking-tight font-heading mb-4 leading-tight">
                        Alees Medical Center
                    </h1>
                    <p class="text-lg text-white text-opacity-90 mb-8 font-light">
                        Aesthetically designed. Clinically driven. Dedicated to providing state-of-the-art healthcare.
                    </p>
                    
                    <!-- Glassmorphic Feature Card -->
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl border border-white border-opacity-20 p-6 shadow-xl space-y-4">
                        <h3 class="text-md font-semibold tracking-wider uppercase text-teal-200">Our Departments</h3>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <span class="p-2 rounded-lg bg-teal-800 bg-opacity-40 text-teal-300">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                </span>
                                <span class="text-sm font-medium">Cardiology</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="p-2 rounded-lg bg-teal-800 bg-opacity-40 text-teal-300">
                                    <i class="bi bi-gender-female"></i>
                                </span>
                                <span class="text-sm font-medium">Gynecology</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="p-2 rounded-lg bg-teal-800 bg-opacity-40 text-teal-300">
                                    <i class="bi bi-patch-check-fill"></i>
                                </span>
                                <span class="text-sm font-medium">Dermatology</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="p-2 rounded-lg bg-teal-800 bg-opacity-40 text-teal-300">
                                    <i class="bi bi-emoji-smile-fill"></i>
                                </span>
                                <span class="text-sm font-medium">Dentistry</span>
                            </div>
                            <div class="flex items-center gap-3 col-span-2">
                                <span class="p-2 rounded-lg bg-teal-800 bg-opacity-40 text-teal-300">
                                    <i class="bi bi-people-fill"></i>
                                </span>
                                <span class="text-sm font-medium">Pediatrics & Primary Care</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 text-xs text-white text-opacity-60 flex items-center gap-2">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Secure SSL-encrypted clinical patient management platform</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Pane: Form input card -->
            <div class="w-full lg:w-5/12 flex items-center justify-center p-6 sm:p-12 md:p-20 bg-white">
                <div class="w-full max-w-md">
                    <!-- Brand identity on mobile -->
                    <div class="lg:hidden text-center mb-8">
                        <h1 class="text-3xl font-extrabold tracking-tight text-teal-800 font-heading">
                            Alees Medical Center
                        </h1>
                        <p class="text-sm text-slate-500 mt-2">
                            Aesthetically designed. Clinically driven.
                        </p>
                    </div>
                    
                    <div class="bg-white p-2 rounded-2xl">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
