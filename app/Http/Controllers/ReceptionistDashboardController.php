<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ReceptionistDashboardController extends Controller
{
    public function index()
    {
        // Receptionists manage all appointments across the system
        $appointments = Appointment::with(['doctor', 'department', 'service'])
                            ->latest()
                            ->get();

        $stats = [
            'total'     => $appointments->count(),
            'pending'   => $appointments->where('status', 'pending')->count(),
            'confirmed' => $appointments->where('status', 'confirmed')->count(),
            'cancelled' => $appointments->where('status', 'cancelled')->count(),
        ];

        $doctors = Doctor::with('department')->get();
        $departments = Department::all();
        $services = Service::all();

        return view('receptionist.dashboard', compact('appointments', 'stats', 'doctors', 'departments', 'services'));
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $appointment->update(['status' => $request->status]);

        return redirect()->route('receptionist.dashboard')->with('success', 'Appointment status updated successfully by receptionist.');
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'patient_name'   => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:255',
            'preferred_date' => 'required|date|after_or_equal:today',
            'department_id'  => 'required|exists:departments,id',
            'doctor_id'      => 'required|exists:doctors,id',
            'service_id'     => 'required|exists:services,id',
            'message'        => 'nullable|string',
        ]);

        Appointment::create(array_merge($request->all(), [
            'status' => 'confirmed' // Receptionist appointments are auto-confirmed
        ]));

        return redirect()->route('receptionist.dashboard')->with('success', 'New walk-in appointment created and confirmed successfully!');
    }
}
