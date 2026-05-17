<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_appointments'     => Appointment::count(),
            'pending_appointments'   => Appointment::where('status', 'pending')->count(),
            'confirmed_appointments' => Appointment::where('status', 'confirmed')->count(),
            'cancelled_appointments' => Appointment::where('status', 'cancelled')->count(),
            'total_doctors'          => Doctor::count(),
            'total_departments'      => Department::count(),
            'total_patients'         => Appointment::distinct('email')->count('email'),
            'estimated_revenue'      => Appointment::where('status', 'confirmed')
                                            ->whereNotNull('service_id')
                                            ->with('service')
                                            ->get()
                                            ->sum(function ($appt) {
                                                return $appt->service->fee ?? 0;
                                            })
        ];

        $recent_appointments = Appointment::with(['doctor', 'department', 'service'])
                                    ->latest()
                                    ->limit(5)
                                    ->get();

        $doctors = Doctor::with('department')->get();

        return view('admin.dashboard', compact('stats', 'recent_appointments', 'doctors'));
    }
}
