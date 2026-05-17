<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $cardiology = Department::where('name', 'Cardiology')->first();
        $neurology = Department::where('name', 'Neurology')->first();
        $ortho = Department::where('name', 'Orthopedics')->first();
        $pediatrics = Department::where('name', 'Pediatrics')->first();
        $surgery = Department::where('name', 'General Surgery')->first();

        $doctors = [
            [
                'department_id' => $cardiology->id ?? 1,
                'name' => 'Dr. Salman Ahmed',
                'specialty' => 'Interventional Cardiologist',
                'qualifications' => 'MBBS, FCPS (Cardiology)',
                'experience_years' => 15,
                'phone' => '0300-1111111',
                'is_featured' => true,
            ],
            [
                'department_id' => $neurology->id ?? 2,
                'name' => 'Dr. Ayesha Khan',
                'specialty' => 'Neurosurgeon',
                'qualifications' => 'MBBS, FRCS (Neurology)',
                'experience_years' => 12,
                'phone' => '0300-2222222',
                'is_featured' => true,
            ],
            [
                'department_id' => $ortho->id ?? 3,
                'name' => 'Dr. Tariq Mahmood',
                'specialty' => 'Orthopedic Surgeon',
                'qualifications' => 'MBBS, MS (Ortho)',
                'experience_years' => 20,
                'phone' => '0300-3333333',
                'is_featured' => false,
            ],
            [
                'department_id' => $pediatrics->id ?? 4,
                'name' => 'Dr. Fatima Ali',
                'specialty' => 'Pediatrician',
                'qualifications' => 'MBBS, DCH',
                'experience_years' => 8,
                'phone' => '0300-4444444',
                'is_featured' => false,
            ],
            [
                'department_id' => $surgery->id ?? 5,
                'name' => 'Dr. Usman Raza',
                'specialty' => 'General Surgeon',
                'qualifications' => 'MBBS, FCPS (Surgery)',
                'experience_years' => 10,
                'phone' => '0300-5555555',
                'is_featured' => false,
            ],
            [
                'department_id' => $cardiology->id ?? 1,
                'name' => 'Dr. Zara Siddiqui',
                'specialty' => 'Consultant Cardiologist',
                'qualifications' => 'MBBS, MRCP (UK)',
                'experience_years' => 7,
                'phone' => '0300-6666666',
                'is_featured' => false,
            ],
        ];

        foreach ($doctors as $doc) {
            Doctor::create(array_merge($doc, [
                'slug' => Str::slug($doc['name']),
                'bio' => 'Dedicated and compassionate specialist with years of experience in providing excellent patient care.',
                'photo' => 'https://ui-avatars.com/api/?name=' . urlencode($doc['name']) . '&background=0C3B6E&color=fff&size=200',
            ]));
        }
    }
}
