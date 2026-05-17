<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        $departments = Department::where('is_active', true)->get();
        $selectedDoctorId = $request->query('doctor');
        $doctors = Doctor::all();
        $services = \App\Models\Service::all();
        
        return view('pages.appointment', compact('departments', 'doctors', 'selectedDoctorId', 'services'));
    }

    public function store(AppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated());

        if ($appointment->email) {
            Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
        }

        return redirect()->back()->with('success', 'Your appointment request has been submitted successfully! We will contact you shortly.');
    }
}
