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
            'appointments' => Appointment::count(),
            'doctors' => Doctor::count(),
            'departments' => Department::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
