<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Cardiology', 'icon' => 'bi-heart-pulse'],
            ['name' => 'Gynecology', 'icon' => 'bi-gender-female'],
            ['name' => 'Dermatology', 'icon' => 'bi-palette-fill'],
            ['name' => 'Pediatrics', 'icon' => 'bi-emoji-smile-fill'],
            ['name' => 'Dentistry', 'icon' => 'bi-activity'],
            ['name' => 'Ophthalmology', 'icon' => 'bi-eye-fill'],
            ['name' => 'Orthopedics', 'icon' => 'bi-clipboard-pulse'],
            ['name' => 'Gastroenterology', 'icon' => 'bi-capsule'],
            ['name' => 'Psychiatry', 'icon' => 'bi-shield-fill-check'],
            ['name' => 'General Surgery', 'icon' => 'bi-scissors'],
            ['name' => 'Physiotherapy', 'icon' => 'bi-person-walking'],
            ['name' => 'Alternative Medicine', 'icon' => 'bi-leaf-fill'],
        ];

        foreach ($departments as $dept) {
            Department::create([
                'name' => $dept['name'],
                'slug' => Str::slug($dept['name']),
                'description' => 'Comprehensive ' . strtolower($dept['name']) . ' care and services provided by experienced professionals.',
                'icon' => $dept['icon'],
                'is_active' => true,
            ]);
        }
    }
}
