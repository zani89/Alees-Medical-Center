<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            ['name' => 'NICU', 'description' => 'State-of-the-art Neonatal Intensive Care Unit for premature and ill newborns.', 'icon' => 'bi-heart-pulse'],
            ['name' => 'ECG', 'description' => 'Advanced Electrocardiogram services for heart monitoring.', 'icon' => 'bi-activity'],
            ['name' => 'Physiotherapy', 'description' => 'Expert physiotherapy sessions to help you recover your mobility.', 'icon' => 'bi-person-arms-up'],
            ['name' => '24/7 Emergency', 'description' => 'Round-the-clock emergency medical care and trauma response.', 'icon' => 'bi-truck-front'],
            ['name' => 'Pharmacy', 'description' => 'Fully stocked pharmacy available 24/7 for all your medication needs.', 'icon' => 'bi-capsule'],
            ['name' => 'Laboratory', 'description' => 'In-house diagnostic laboratory with quick and accurate test results.', 'icon' => 'bi-virus'],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
