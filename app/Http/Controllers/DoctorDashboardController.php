<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Find corresponding Doctor profile
        $doctor = Doctor::where('email', $user->email)->first();
        
        if (!$doctor) {
            abort(404, 'Doctor profile not found for this account.');
        }

        // Fetch all appointments scheduled for this doctor
        $appointments = Appointment::with(['department', 'service'])
                            ->where('doctor_id', $doctor->id)
                            ->orderBy('preferred_date', 'asc')
                            ->get();

        // Calculate analytics
        $stats = [
            'total'     => $appointments->count(),
            'pending'   => $appointments->where('status', 'pending')->count(),
            'confirmed' => $appointments->where('status', 'confirmed')->count(),
        ];

        return view('doctor.dashboard', compact('doctor', 'appointments', 'stats'));
    }

    public function updateAppointmentStatus(Request $request, Appointment $appointment)
    {
        $user = Auth::user();
        $doctor = Doctor::where('email', $user->email)->first();

        // Ensure the doctor owns this appointment before permitting updates
        if (!$doctor || $appointment->doctor_id !== $doctor->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $appointment->update(['status' => $request->status]);

        return redirect()->route('doctor.dashboard')->with('success', 'Patient appointment status updated successfully.');
    }
}
