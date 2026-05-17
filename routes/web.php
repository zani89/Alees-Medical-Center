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
    // Show upcoming appointments for the logged in user based on email
    $appointments = Appointment::with(['doctor', 'department', 'service'])
                        ->where('email', auth()->user()->email)
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

// Admin Panel Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/appointments', [\App\Http\Controllers\Admin\AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}', [\App\Http\Controllers\Admin\AdminAppointmentController::class, 'updateStatus'])->name('appointments.update');
});

require __DIR__.'/auth.php';
