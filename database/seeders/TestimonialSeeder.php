<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'patient_name' => 'Muhammad Ali',
                'treatment_type' => 'Heart Surgery',
                'quote' => 'The care I received at the cardiology department was exceptional. Dr. Salman and the team saved my life.',
                'rating' => 5,
            ],
            [
                'patient_name' => 'Sadia Hussain',
                'treatment_type' => 'Childbirth',
                'quote' => 'The pediatric and maternity wards are fully equipped. The nursing staff was very cooperative during my stay.',
                'rating' => 5,
            ],
            [
                'patient_name' => 'Kashif Riaz',
                'treatment_type' => 'Orthopedic Treatment',
                'quote' => 'Recovering from a sports injury was tough, but Dr. Tariq made the surgery and physiotherapy process very smooth.',
                'rating' => 4,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create(array_merge($t, ['is_active' => true]));
        }
    }
}
