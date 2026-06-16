<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight font-heading">
            {{ __('Patient Portal') }}
        </h2>
    </x-slot>

    <!-- Import Bootstrap Icons for dashboard indicators -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="py-10 bg-slate-50 min-h-screen font-body" x-data="{ 
        activeTab: 'all',
        cancelModalOpen: false,
        selectedApptId: null,
        cancelActionUrl: '',
        openCancelModal(id, url) {
            this.selectedApptId = id;
            this.cancelActionUrl = url;
            this.cancelModalOpen = true;
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success/Error Alert System -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-2xl flex items-center gap-3 shadow-sm transition duration-150">
                    <div class="p-2 rounded-lg bg-emerald-500 bg-opacity-10 text-emerald-600">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Action Successful</p>
                        <p class="text-xs text-emerald-600 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm rounded-2xl flex items-center gap-3 shadow-sm transition duration-150">
                    <div class="p-2 rounded-lg bg-rose-500 bg-opacity-10 text-rose-600">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Unable to Process</p>
                        <p class="text-xs text-rose-600 mt-0.5">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Welcome Header Banner with User Profile Summary -->
            <div class="mb-8 p-6 md:p-8 rounded-3xl text-white shadow-xl relative overflow-hidden" style="background: linear-gradient(135deg, #0a5b78, #07869a);">
                <!-- Decorative blurred circle background -->
                <div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-teal-400 opacity-20 blur-2xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 rounded-full bg-blue-300 opacity-20 blur-2xl"></div>

                <div class="relative z-10 md:flex md:items-center md:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <!-- Profile Avatar Card -->
                        <div class="w-16 h-16 rounded-2xl bg-white bg-opacity-15 backdrop-blur-md border border-white border-opacity-20 flex items-center justify-center text-2xl font-bold font-heading text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight font-heading">{{ Auth::user()->name }}</h1>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white bg-opacity-20 text-white border border-white border-opacity-10 uppercase">
                                    Patient
                                </span>
                            </div>
                            <p class="text-white text-opacity-80 text-sm mt-1">
                                <i class="bi bi-envelope-fill mr-1"></i> {{ Auth::user()->email }} 
                                <span class="mx-2">•</span> 
                                <i class="bi bi-clock-history mr-1"></i> Member since {{ Auth::user()->created_at->format('M Y') }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-6 md:mt-0 flex flex-wrap gap-3">
                        <a href="{{ route('appointment.create') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-bold rounded-xl text-teal-900 bg-white hover:bg-slate-50 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-150 ease-in-out">
                            <i class="bi bi-calendar-plus-fill mr-2"></i> Book Appointment
                        </a>
                        <a href="https://wa.me/923415061201" target="_blank" class="inline-flex items-center justify-center px-4 py-3 bg-teal-800 bg-opacity-35 hover:bg-opacity-50 text-white text-sm font-semibold rounded-xl border border-white border-opacity-10 backdrop-blur-sm transition duration-150">
                            <i class="bi bi-whatsapp mr-2 text-teal-300"></i> Clinic Support
                        </a>
                    </div>
                </div>
            </div>

            <!-- Operational Metric cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="p-3.5 rounded-xl bg-blue-50 text-blue-600">
                        <i class="bi bi-journal-medical text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-slate-400 text-xs uppercase font-bold tracking-wider block">Total Bookings</span>
                        <span class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $appointments->count() }}</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="p-3.5 rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="bi bi-check-circle-fill text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-slate-400 text-xs uppercase font-bold tracking-wider block">Confirmed Consultations</span>
                        <span class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $appointments->where('status', 'confirmed')->count() }}</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="p-3.5 rounded-xl bg-amber-50 text-amber-600">
                        <i class="bi bi-hourglass-split text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-slate-400 text-xs uppercase font-bold tracking-wider block">Awaiting Review</span>
                        <span class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $appointments->where('status', 'pending')->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Schedule & Main Container -->
            <div class="bg-white shadow-sm rounded-3xl border border-slate-100 overflow-hidden">
                
                <!-- Tab filters & search header -->
                <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 font-heading">Your Schedule History</h3>
                        <p class="text-slate-500 text-xs mt-1">Review the status and details of your consultation bookings.</p>
                    </div>
                    
                    <!-- Alpine-based client filters -->
                    <div class="flex bg-slate-100 p-1.5 rounded-xl self-start md:self-auto">
                        <button @click="activeTab = 'all'" 
                                :class="activeTab === 'all' ? 'bg-white text-teal-800 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-800 font-medium'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition">
                            All
                        </button>
                        <button @click="activeTab = 'pending'" 
                                :class="activeTab === 'pending' ? 'bg-white text-teal-800 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-800 font-medium'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition">
                            Pending
                        </button>
                        <button @click="activeTab = 'confirmed'" 
                                :class="activeTab === 'confirmed' ? 'bg-white text-teal-800 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-800 font-medium'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition">
                            Confirmed
                        </button>
                        <button @click="activeTab = 'cancelled'" 
                                :class="activeTab === 'cancelled' ? 'bg-white text-teal-800 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-800 font-medium'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition">
                            Cancelled
                        </button>
                    </div>
                </div>
                
                <!-- Table / Schedule View -->
                <div class="p-6 md:p-8">
                    @if($appointments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-4 bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider rounded-l-2xl">Preferred Date</th>
                                        <th class="px-6 py-4 bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Department</th>
                                        <th class="px-6 py-4 bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Consulting Details</th>
                                        <th class="px-6 py-4 bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Current Status</th>
                                        <th class="px-6 py-4 bg-slate-50 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider rounded-r-2xl">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    @foreach($appointments as $appt)
                                    <tr class="hover:bg-slate-50 transition duration-150"
                                        x-show="activeTab === 'all' || activeTab === '{{ $appt->status }}'">
                                        <td class="px-6 py-5 whitespace-nowrap text-sm font-bold text-slate-800">
                                            <div class="flex items-center gap-2">
                                                <div class="p-1.5 rounded-lg bg-teal-50 text-teal-600">
                                                    <i class="bi bi-calendar-event"></i>
                                                </div>
                                                {{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-sm text-slate-600">
                                            <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-semibold rounded-full border border-slate-200">
                                                {{ $appt->department->name }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-slate-800 flex items-center gap-1.5">
                                                <i class="bi bi-person-circle text-slate-400"></i> {{ $appt->doctor->name ?? 'Any Available Doctor' }}
                                            </div>
                                            @if($appt->service)
                                                <div class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                                    <i class="bi bi-activity text-teal-500"></i> {{ $appt->service->name }} (Rs. {{ number_format($appt->service->fee, 0) }})
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex items-center text-xs font-bold rounded-full 
                                                {{ $appt->status === 'confirmed' ? 'bg-emerald-50 text-emerald-800 border border-emerald-100' : ($appt->status === 'cancelled' ? 'bg-rose-50 text-rose-800 border border-rose-100' : 'bg-amber-50 text-amber-800 border border-amber-100') }}">
                                                <span class="h-1.5 w-1.5 rounded-full mr-2 
                                                    {{ $appt->status === 'confirmed' ? 'bg-emerald-500' : ($appt->status === 'cancelled' ? 'bg-rose-500' : 'bg-amber-500') }}"></span>
                                                {{ ucfirst($appt->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                            @if($appt->status === 'pending')
                                                <button @click="openCancelModal({{ $appt->id }}, '{{ route('appointments.cancel', $appt->id) }}')" 
                                                        class="text-rose-500 hover:text-rose-700 hover:bg-rose-50 px-3 py-1.5 rounded-lg border border-rose-100 transition duration-150">
                                                    <i class="bi bi-x-circle mr-1"></i> Cancel
                                                </button>
                                            @else
                                                <span class="text-xs text-slate-400 font-normal italic">No Actions Available</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- No Appointments Scheduled (Empty State) -->
                        <div class="text-center py-16">
                            <div class="mx-auto w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                                <i class="bi bi-calendar2-x-fill text-3xl text-teal-600 text-opacity-70"></i>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 font-heading">No Appointments Scheduled</h4>
                            <p class="text-slate-500 mt-2 text-sm max-w-sm mx-auto">You have no upcoming or historical consultation bookings registered to your email yet.</p>
                            <div class="mt-8">
                                <a href="{{ route('appointment.create') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold rounded-xl text-white shadow-md transition" style="background-color: #07869a;">
                                    Book Your First Appointment
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>

        <!-- Appointment Cancel Confirmation Modal (Alpine.js overlay) -->
        <div x-show="cancelModalOpen" 
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4"
             aria-labelledby="modal-title" role="dialog" aria-modal="true">
            
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-slate-900 bg-opacity-40 backdrop-blur-sm transition-opacity" 
                 x-show="cancelModalOpen"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="cancelModalOpen = false"></div>

            <!-- Modal Content -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl transform transition-all sm:max-w-md sm:w-full border border-slate-100 relative z-10"
                 x-show="cancelModalOpen"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="p-6 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-rose-50 text-rose-600 mb-4">
                        <i class="bi bi-exclamation-triangle text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 font-heading" id="modal-title">Cancel Appointment?</h3>
                    <p class="text-slate-500 text-sm mt-2">
                        Are you sure you want to cancel this appointment request? This action cannot be undone.
                    </p>
                </div>
                
                <div class="bg-slate-50 px-6 py-4 flex flex-row-reverse gap-3">
                    <form :action="cancelActionUrl" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="inline-flex justify-center px-4 py-2.5 text-sm font-bold text-white bg-rose-600 hover:bg-rose-700 rounded-xl shadow transition">
                            Cancel Appointment
                        </button>
                    </form>
                    <button type="button" 
                            @click="cancelModalOpen = false" 
                            class="inline-flex justify-center px-4 py-2.5 text-sm font-semibold text-slate-700 bg-white hover:bg-slate-100 border border-slate-200 rounded-xl transition">
                        Keep Appointment
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
