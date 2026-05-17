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
            ['name' => 'Neurology', 'icon' => 'bi-brain'],
            ['name' => 'Orthopedics', 'icon' => 'bi-bandaid'],
            ['name' => 'Pediatrics', 'icon' => 'bi-emoji-smile'],
            ['name' => 'Gynaecology', 'icon' => 'bi-gender-female'],
            ['name' => 'General Surgery', 'icon' => 'bi-hospital'],
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
