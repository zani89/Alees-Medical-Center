<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)->get();
        $featuredDoctors = Doctor::where('is_featured', true)->limit(3)->get();
        $testimonials = Testimonial::where('is_active', true)->get();

        return view('pages.home', compact('departments', 'featuredDoctors', 'testimonials'));
    }
}
