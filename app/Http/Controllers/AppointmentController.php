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

        // Load relationships to retrieve name values for the WhatsApp message
        $appointment->load(['doctor', 'department', 'service']);

        if ($appointment->email) {
            Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
        }

        // Official Clinic WhatsApp Number: 923415061201 (emergency line)
        $whatsappNumber = '923415061201';
        $message = "Hello Alees Medical Center, I have just booked an appointment! Details:\n\n"
                 . "👤 *Patient:* " . $appointment->patient_name . "\n"
                 . "📞 *Phone:* " . $appointment->phone . "\n"
                 . "📅 *Preferred Date:* " . \Carbon\Carbon::parse($appointment->preferred_date)->format('M d, Y') . "\n"
                 . "🏥 *Department:* " . $appointment->department->name . "\n"
                 . "👨‍⚕️ *Doctor:* " . ($appointment->doctor->name ?? 'Any Available') . "\n"
                 . "💼 *Service:* " . ($appointment->service->name ?? 'General Consultation');

        $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($message);

        return redirect()->back()->with([
            'success' => 'Your appointment request has been submitted successfully! We will contact you shortly.',
            'whatsapp_url' => $whatsappUrl
        ]);
    }
}
