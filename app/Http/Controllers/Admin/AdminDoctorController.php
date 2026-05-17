<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminDoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')->latest()->get();
        $departments = Department::all();
        return view('admin.doctors.index', compact('doctors', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:users,email|unique:doctors,email',
            'specialty'        => 'required|string|max:255',
            'qualifications'   => 'required|string|max:255',
            'phone'            => 'required|string|max:255',
            'department_id'    => 'required|exists:departments,id',
            'experience_years' => 'required|integer|min:0',
            'bio'              => 'nullable|string',
            'password'         => 'required|string|min:6',
        ]);

        // Create User login account first
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'doctor',
        ]);

        // Create matching Doctor profile
        Doctor::create([
            'department_id'    => $request->department_id,
            'name'             => $request->name,
            'slug'             => Str::slug($request->name) . '-' . rand(100, 999),
            'specialty'        => $request->specialty,
            'qualifications'   => $request->qualifications,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'experience_years' => $request->experience_years,
            'bio'              => $request->bio ?? 'Dedicated and compassionate clinical specialist.',
            'photo'            => 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=0a5b78&color=fff&size=200',
            'is_featured'      => false,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor and matching login account created successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        // Delete corresponding user if exists
        if ($doctor->email) {
            User::where('email', $doctor->email)->delete();
        }
        
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor and associated login account removed successfully.');
    }
}
