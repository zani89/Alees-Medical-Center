<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight font-heading">
            {{ __('Patient Portal') }}
        </h2>
    </x-slot>

    <!-- Import Bootstrap Icons for dashboard indicators -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Header Banner -->
            <div class="mb-8 p-8 rounded-2xl text-white shadow-lg" style="background: linear-gradient(135deg, #0a5b78, #07869a);">
                <div class="md:flex md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold mb-2 font-heading">Welcome back, {{ Auth::user()->name }}!</h1>
                        <p class="text-white text-opacity-80">Track your active consultation requests, schedules, and clinical statuses in real-time.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('appointment.create') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-full text-teal-800 bg-white hover:bg-gray-100 shadow transition duration-150 ease-in-out" style="color: #0a5b78;">
                            <i class="bi bi-calendar-plus-fill mr-2"></i> Book Appointment
                        </a>
                    </div>
                </div>
            </div>

            <!-- Operational Metric cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="p-4 rounded-xl bg-blue-50 text-blue-600 mr-4">
                        <i class="bi bi-journal-medical text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-gray-400 text-sm block font-medium">Total Appointments</span>
                        <span class="text-2xl font-bold text-gray-800">{{ $appointments->count() }}</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="p-4 rounded-xl bg-emerald-50 text-emerald-600 mr-4">
                        <i class="bi bi-check-circle text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-gray-400 text-sm block font-medium">Confirmed</span>
                        <span class="text-2xl font-bold text-gray-800">{{ $appointments->where('status', 'confirmed')->count() }}</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="p-4 rounded-xl bg-amber-50 text-amber-600 mr-4">
                        <i class="bi bi-hourglass-split text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-gray-400 text-sm block font-medium">Pending Requests</span>
                        <span class="text-2xl font-bold text-gray-800">{{ $appointments->where('status', 'pending')->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Appointments Table Container -->
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100">
                <div class="p-8 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 font-heading">Your Schedule History</h3>
                    <p class="text-gray-500 text-sm mt-1">Review the active progress of your consultation bookings below.</p>
                </div>
                
                <div class="p-8">
                    @if($appointments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-4 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Preferred Date</th>
                                        <th class="px-6 py-4 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Department</th>
                                        <th class="px-6 py-4 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Consulting Details</th>
                                        <th class="px-6 py-4 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Current Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($appointments as $appt)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                            <div class="flex items-center">
                                                <i class="bi bi-calendar2-event text-teal-600 mr-2"></i>
                                                {{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-medium rounded-full border border-gray-200">
                                                {{ $appt->department->name }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-gray-800">
                                                <i class="bi bi-person-fill text-gray-400 mr-1"></i> {{ $appt->doctor->name ?? 'Any Available Doctor' }}
                                            </div>
                                            @if($appt->service)
                                                <div class="text-xs text-gray-500 mt-1 flex items-center">
                                                    <i class="bi bi-activity mr-1"></i> {{ $appt->service->name }} (Rs. {{ number_format($appt->service->fee, 0) }})
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1.5 inline-flex items-center text-xs font-bold rounded-full 
                                                {{ $appt->status === 'confirmed' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : ($appt->status === 'cancelled' ? 'bg-rose-100 text-rose-800 border border-rose-200' : 'bg-amber-100 text-amber-800 border border-amber-200') }}">
                                                <span class="h-2 w-2 rounded-full mr-2 
                                                    {{ $appt->status === 'confirmed' ? 'bg-emerald-500' : ($appt->status === 'cancelled' ? 'bg-rose-500' : 'bg-amber-500') }}"></span>
                                                {{ ucfirst($appt->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-content-center mb-4 text-gray-400">
                                <i class="bi bi-calendar2-x fs-3"></i>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800 font-heading">No Appointments Scheduled</h4>
                            <p class="text-gray-500 mt-1 text-sm max-w-sm mx-auto">You have no upcoming or historical consultation bookings registered to your email yet.</p>
                            <div class="mt-6">
                                <a href="{{ route('appointment.create') }}" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold rounded-full text-white shadow bg-teal-600 hover:bg-teal-700 transition" style="background-color: #07869a;">
                                    Book Your First Appointment
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
