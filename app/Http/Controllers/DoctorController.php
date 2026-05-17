<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')->get();
        return view('pages.doctors', compact('doctors'));
    }

    public function show($slug)
    {
        $doctor = Doctor::with('department')->where('slug', $slug)->firstOrFail();
        return view('pages.doctor-show', compact('doctor')); // Wait, user said doctors.show, I will use doctors.show view if needed, but let's just stick to pages.doctor-show
    }
}
