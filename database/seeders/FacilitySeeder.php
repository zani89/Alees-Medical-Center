<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Women’s Healthcare',
                'description' => 'Dedicated gynecology, obstetrics, and premium maternity care facilities.',
                'icon' => 'bi-gender-female'
            ],
            [
                'name' => 'Cardiology',
                'description' => 'Advanced heart care diagnostic setup including ECG and professional consultations.',
                'icon' => 'bi-heart-pulse'
            ],
            [
                'name' => 'Chinese Medicine',
                'description' => 'Traditional and alternative Chinese medical treatments and herbal setups.',
                'icon' => 'bi-leaf-fill'
            ],
            [
                'name' => 'Homeopathy',
                'description' => 'Safe, holistic, and professional homeopathic medicine consultation suites.',
                'icon' => 'bi-capsule'
            ],
            [
                'name' => 'ECG',
                'description' => 'Modern Electrocardiogram monitoring equipment for rapid, precise diagnostics.',
                'icon' => 'bi-activity'
            ],
            [
                'name' => 'Physiotherapy',
                'description' => 'Rehabilitation gymnasium and physical therapy suites with expert guidance.',
                'icon' => 'bi-person-walking'
            ],
            [
                'name' => 'NICU',
                'description' => 'Neonatal Intensive Care Unit with modern incubators and 24/7 specialist pediatric care.',
                'icon' => 'bi-heart-pulse-fill'
            ],
            [
                'name' => 'Delivery Facility',
                'description' => 'State-of-the-art labor rooms and maternity suites offering a secure, comfortable birth experience.',
                'icon' => 'bi-hospital'
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
