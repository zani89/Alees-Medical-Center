<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProfileController;
use App\Models\Appointment;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{slug}', [DoctorController::class, 'show'])->name('doctors.show');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{slug}', [DepartmentController::class, 'show'])->name('departments.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');

Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Patient Dashboard (Breeze)
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'doctor') {
        return redirect()->route('doctor.dashboard');
    } elseif ($user->role === 'receptionist') {
        return redirect()->route('receptionist.dashboard');
    }

    // Show upcoming appointments for the logged in user based on email
    $appointments = Appointment::with(['doctor', 'department', 'service'])
                        ->where('email', $user->email)
                        ->orderBy('preferred_date', 'asc')
                        ->get();
    return view('dashboard', compact('appointments'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze Auth Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Panel Routes (Restricted strictly to the designated Admin Email)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/appointments', [\App\Http\Controllers\Admin\AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}', [\App\Http\Controllers\Admin\AdminAppointmentController::class, 'updateStatus'])->name('appointments.update');
    
    // Doctor Management
    Route::get('/doctors', [\App\Http\Controllers\Admin\AdminDoctorController::class, 'index'])->name('doctors.index');
    Route::post('/doctors', [\App\Http\Controllers\Admin\AdminDoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/doctors/{doctor}', [\App\Http\Controllers\Admin\AdminDoctorController::class, 'destroy'])->name('doctors.destroy');
});

// Doctor Dashboard Routes (Restricted strictly to logged-in Doctor accounts)
Route::middleware(['auth', 'doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::patch('/appointments/{appointment}', [\App\Http\Controllers\DoctorDashboardController::class, 'updateAppointmentStatus'])->name('appointments.update');
});

// Receptionist Dashboard Routes (Restricted strictly to logged-in Receptionist accounts)
Route::middleware(['auth', 'receptionist'])->prefix('receptionist')->name('receptionist.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\ReceptionistDashboardController::class, 'index'])->name('dashboard');
    Route::post('/appointments', [\App\Http\Controllers\ReceptionistDashboardController::class, 'storeAppointment'])->name('appointments.store');
    Route::patch('/appointments/{appointment}', [\App\Http\Controllers\ReceptionistDashboardController::class, 'updateAppointment'])->name('appointments.update');
});

require __DIR__.'/auth.php';
