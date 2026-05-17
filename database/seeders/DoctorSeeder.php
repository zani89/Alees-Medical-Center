<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $rawDoctors = [
            ['name' => 'Dr. Kaleem Butt', 'specialty' => 'Cardiologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ayesha Mujahid', 'specialty' => 'Gynecologist & Obstetrician', 'qualifications' => 'MBBS, MPhil, MCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ayesha Bilal', 'specialty' => 'Dermatologist & Wound Specialist', 'qualifications' => 'MBBS, MD', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Naseem Hussain', 'specialty' => 'Pediatrician', 'qualifications' => 'MBBS, DCH, DCN', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Nabeel', 'specialty' => 'Dental Surgeon', 'qualifications' => 'BDS, RDS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Noor-ur-Rehman', 'specialty' => 'Cardiologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ayesha Yazdani', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, D-Derm', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Nargis Khan', 'specialty' => 'Gynecologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Safdar Yousaf', 'specialty' => 'Ophthalmologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Rizwan-ul-Haq', 'specialty' => 'Orthopedic Specialist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ghulam Irfan', 'specialty' => 'Gastroenterologist', 'qualifications' => 'MBBS, MS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Fatima Sher', 'specialty' => 'Psychiatrist', 'qualifications' => 'MBBS, FCPS, PGPN (USA)', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Nasir', 'specialty' => 'General Surgeon', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Saeed Ehsan', 'specialty' => 'General Surgeon', 'qualifications' => 'MBBS, RMP, MS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ali Raza', 'specialty' => 'General Surgeon', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Fawad', 'specialty' => 'Physiotherapist', 'qualifications' => 'DPT', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Abid', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ayesha', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, MS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Nasir', 'specialty' => 'Dermatologist', 'qualifications' => 'MD, DC, DRHMS, PhD', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Asim', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Ahmed', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
            ['name' => 'Dr. Sajid', 'specialty' => 'Dermatologist', 'qualifications' => 'MBBS, FCPS', 'phone' => '0341-5061201'],
        ];

        // Maps Doctor Specialty raw name -> Department seed name
        $deptMap = [
            'Cardiologist' => 'Cardiology',
            'Gynecologist & Obstetrician' => 'Gynecology',
            'Gynecologist' => 'Gynecology',
            'Dermatologist & Wound Specialist' => 'Dermatology',
            'Dermatologist' => 'Dermatology',
            'Pediatrician' => 'Pediatrics',
            'Dental Surgeon' => 'Dentistry',
            'Ophthalmologist' => 'Ophthalmology',
            'Orthopedic Specialist' => 'Orthopedics',
            'Gastroenterologist' => 'Gastroenterology',
            'Psychiatrist' => 'Psychiatry',
            'General Surgeon' => 'General Surgery',
            'Physiotherapist' => 'Physiotherapy',
        ];

        // Retrieve and index all seeded departments
        $departments = Department::all()->keyBy('name');

        foreach ($rawDoctors as $index => $doc) {
            $mappedDeptName = $deptMap[$doc['specialty']] ?? 'General Surgery';
            $dept = $departments->get($mappedDeptName);

            // Generate clean unique email
            $cleanNameForEmail = str_replace('Dr. ', '', $doc['name']);
            $email = 'dr.' . Str::slug($cleanNameForEmail, '.') . '@aleesmedical.com';
            
            // Adjust email if duplicate
            if (Doctor::where('email', $email)->exists() || User::where('email', $email)->exists()) {
                $email = 'dr.' . Str::slug($cleanNameForEmail, '.') . ($index + 1) . '@aleesmedical.com';
            }

            // Generate unique slug by suffixing with index if name is duplicate (e.g. Dr. Nasir)
            $slug = Str::slug($doc['name']);
            if (Doctor::where('slug', $slug)->exists()) {
                $slug = $slug . '-' . ($index + 1);
            }

            // Create Doctor profile record
            Doctor::create([
                'department_id'    => $dept->id ?? 1,
                'name'             => $doc['name'],
                'slug'             => $slug,
                'specialty'        => $doc['specialty'],
                'qualifications'   => $doc['qualifications'],
                'experience_years' => rand(5, 20),
                'phone'            => $doc['phone'],
                'email'            => $email,
                'bio'              => 'Highly skilled specialist dedicated to providing premium clinical care at Alees Medical.',
                'photo'            => 'https://ui-avatars.com/api/?name=' . urlencode($doc['name']) . '&background=0a5b78&color=fff&size=200',
                'is_featured'      => ($index < 4)
            ]);

            // Pre-create matching user login credentials for each doctor with 'doctor' role
            User::firstOrCreate(
                ['email' => $email],
                [
                    'name'     => $doc['name'],
                    'password' => Hash::make('doctor123'),
                    'role'     => 'doctor'
                ]
            );
        }
    }
}
