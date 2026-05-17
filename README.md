# Alees Medical, Dental & Aesthetic Center Portal

A premium, full-stack business website and patient scheduling portal built for **Alees Medical, Dental & Aesthetic Center**. This application provides a modern, responsive user experience for patient self-scheduling, coupled with a robust, secure administrative management dashboard to monitor and process clinic operations.

---

## 🚀 GitHub Repository Details

If you are setting up your repository on GitHub, here are the recommended details:

*   **Repository Name:** `alees-medical-center`
*   **Description:** `A premium full-stack hospital management & patient booking portal built with Laravel 11, Bootstrap 5, and Laravel Breeze. Features dynamic appointment scheduling, doctor/service directories, and a comprehensive admin management panel.`
*   **Topics:** `laravel`, `bootstrap5`, `hospital-management`, `appointment-booking`, `full-stack`, `admin-dashboard`, `laravel-breeze`

---

## ✨ Features

### 🌟 Premium Frontend Experience
*   **Modern Aesthetic:** Implements a premium dark-teal and mint-green palette utilizing glassmorphism (frosted blurs), deep soft shadows, and clean modern typography (`Outfit` and `Inter` Google Fonts).
*   **Micro-Animations:** Seamless hover-up card transformations, interactive glowing fields, and live-counting home statistics to capture patient engagement.
*   **Responsive Directories:** Dynamic pages highlighting clinic **Services** (with pricing), **Facilities** (surgeries, diagnostics), and **Doctors** (qualifications, direct contact, quick booking).

### 📅 Patient & Booking Life-Cycle
*   **Interactive Scheduling:** Complete, secure appointment booking form dynamically binding Departments, Doctors, and Services.
*   **Patient Dashboard:** Real-time lookup of all upcoming and historical appointments, displaying status updates (Pending, Approved, Completed, Cancelled) dynamically.

### 🛡️ Administrative Portal (`/admin`)
*   **Clinic Metrics:** Centralized dashboard tracking active appointments, pending requests, total earnings, and registered doctors.
*   **Appointment Lifecycle Control:** Live panel to approve, complete, or cancel patient bookings with instant state changes.
*   **Restricted Route Protection:** Fully guarded backend directory segregating standard patient/guest views from administrative operations.

---

## 🛠️ Tech Stack

*   **Backend:** Laravel 11.x (PHP 8.2+)
*   **Authentication:** Laravel Breeze (Custom split layout separating guest layouts from Tailwind administrative layouts)
*   **Frontend Styling:** Bootstrap 5.x CDN, Custom Vanilla CSS Design System, Bootstrap Icons
*   **Database:** MySQL (MariaDB)

---

## ⚙️ Installation & Setup

Follow these steps to run the project locally on your machine:

### 1. Clone & Navigate
```bash
git clone https://github.com/YOUR_USERNAME/alees-medical-center.git
cd alees-medical-center
```

### 2. Install Dependencies
Ensure you have Composer installed, then run:
```bash
composer install
```

### 3. Environment Configuration
Duplicate the configuration template file and generate the application encryption key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
1. Open your `.env` file and configure your MySQL database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hospital_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. Create the database in your MySQL system (e.g. via phpMyAdmin or XAMPP) named `hospital_db`.

### 5. Migration & Seed Data
Initialize your database schemas (Users, Doctors, Appointments, Services, Facilities) and seed the mock data:
```bash
php artisan migrate:fresh --seed
```

### 6. Local Server launch
Fire up the local PHP development server:
```bash
php artisan serve
```
Access the application locally at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📂 Key Directory Outline

*   `app/Http/Controllers/` - Contains core logic controllers (`AppointmentController`, `AdminController`, `ServiceController`, etc.)
*   `app/Models/` - Core database Eloquent models (`Doctor`, `Service`, `Facility`, `Appointment`).
*   `database/seeders/` - Initial databases populator scripts (`ServiceSeeder`, `FacilitySeeder`, `DoctorSeeder`).
*   `resources/views/layouts/` - Custom layouts: `app.blade.php` (Bootstrap Guest theme) and `breeze.blade.php` (Tailwind Auth dashboard).
*   `resources/views/pages/` - Customer-facing directory (`home`, `services`, `appointment`, `facilities`).
*   `routes/web.php` - Secure, middleware-segregated routing index.
