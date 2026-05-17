<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'General Consultation', 'description' => 'Standard checkup with a general physician.', 'department' => 'General Medicine', 'fee' => 1500, 'icon' => 'bi-stethoscope'],
            ['name' => 'Dental Cleaning', 'description' => 'Professional teeth cleaning and scaling.', 'department' => 'Dentistry', 'fee' => 3000, 'icon' => 'bi-bandaid'],
            ['name' => 'Aesthetic Laser Treatment', 'description' => 'Advanced laser hair removal and skin care.', 'department' => 'Aesthetics', 'fee' => 5000, 'icon' => 'bi-stars'],
            ['name' => 'Root Canal', 'description' => 'Endodontic therapy to fix infected teeth.', 'department' => 'Dentistry', 'fee' => 8000, 'icon' => 'bi-heart-pulse'],
            ['name' => 'Botox & Fillers', 'description' => 'Cosmetic injections for anti-aging.', 'department' => 'Aesthetics', 'fee' => 15000, 'icon' => 'bi-emoji-smile'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
