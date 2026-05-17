<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Varicose Veins Treatment',
                'description' => 'Specialized advanced laser treatment for varicose veins.',
                'department' => 'Dermatology',
                'fee' => 5000,
                'icon' => 'bi-activity'
            ],
            [
                'name' => 'NICU',
                'description' => 'Neonatal Intensive Care Unit for premature and ill newborns.',
                'department' => 'Pediatrics',
                'fee' => 10000,
                'icon' => 'bi-hospital'
            ],
            [
                'name' => 'Delivery Services',
                'description' => 'Maternity and secure childbirth services in modern delivery rooms.',
                'department' => 'Gynecology',
                'fee' => 8000,
                'icon' => 'bi-gender-female'
            ],
            [
                'name' => 'Cardiology Services',
                'description' => 'Comprehensive heart checkups, consultations, and specialized diagnostics.',
                'department' => 'Cardiology',
                'fee' => 2000,
                'icon' => 'bi-heart-pulse'
            ],
            [
                'name' => 'Women’s Healthcare',
                'description' => 'Dedicated gynecology, obstetrics, and premium maternity healthcare.',
                'department' => 'Gynecology',
                'fee' => 3000,
                'icon' => 'bi-heart'
            ],
            [
                'name' => 'Chinese Medicine',
                'description' => 'Alternative Chinese medical treatments and holistic health therapies.',
                'department' => 'Alternative Medicine',
                'fee' => 1500,
                'icon' => 'bi-leaf'
            ],
            [
                'name' => 'Homeopathy',
                'description' => 'Natural and personalized homeopathic treatment packages.',
                'department' => 'Alternative Medicine',
                'fee' => 1000,
                'icon' => 'bi-capsule'
            ],
            [
                'name' => 'ECG',
                'description' => 'Electrocardiogram diagnostic service with instant accurate reporting.',
                'department' => 'Cardiology',
                'fee' => 1500,
                'icon' => 'bi-activity'
            ],
            [
                'name' => 'Physiotherapy',
                'description' => 'Rehabilitation, muscle recovery, and professional physical therapy.',
                'department' => 'Physiotherapy',
                'fee' => 2500,
                'icon' => 'bi-person-walking'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
