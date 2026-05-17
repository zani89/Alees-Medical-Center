<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            DoctorSeeder::class,
            TestimonialSeeder::class,
            ServiceSeeder::class,
            FacilitySeeder::class,
        ]);

        // Pre-create the designated administrator account
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@aleesmedical.com'],
            [
                'name'     => 'Alees Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Pre-create a receptionist account
        \App\Models\User::firstOrCreate(
            ['email' => 'receptionist@aleesmedical.com'],
            [
                'name'     => 'Alees Receptionist',
                'password' => \Illuminate\Support\Facades\Hash::make('receptionist123'),
                'role'     => 'receptionist',
            ]
        );
    }
}
