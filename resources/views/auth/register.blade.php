<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold font-heading text-slate-800">Create Account</h2>
        <p class="text-sm text-slate-500 mt-1">Register for the Alees Medical Patient Portal</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div class="space-y-1">
            <label for="name" class="block text-sm font-medium text-slate-700">Full Name</label>
            <div class="relative rounded-xl shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="bi bi-person"></i>
                </div>
                <input id="name" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autofocus 
                       autocomplete="name"
                       placeholder="John Doe"
                       class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
            </div>
            @if ($errors->has('name'))
                <p class="text-xs text-rose-500 mt-1 flex items-center gap-1">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ $errors->first('name') }}</span>
                </p>
            @endif
        </div>

        <!-- Email Address -->
        <div class="space-y-1">
            <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
            <div class="relative rounded-xl shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="bi bi-envelope"></i>
                </div>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autocomplete="username"
                       placeholder="you@example.com"
                       class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
            </div>
            @if ($errors->has('email'))
                <p class="text-xs text-rose-500 mt-1 flex items-center gap-1">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ $errors->first('email') }}</span>
                </p>
            @endif
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
            <div class="relative rounded-xl shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="bi bi-lock"></i>
                </div>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="new-password"
                       placeholder="••••••••"
                       class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
            </div>
            @if ($errors->has('password'))
                <p class="text-xs text-rose-500 mt-1 flex items-center gap-1">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ $errors->first('password') }}</span>
                </p>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm Password</label>
            <div class="relative rounded-xl shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="bi bi-shield-check"></i>
                </div>
                <input id="password_confirmation" 
                       type="password" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password"
                       placeholder="••••••••"
                       class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
            </div>
            @if ($errors->has('password_confirmation'))
                <p class="text-xs text-rose-500 mt-1 flex items-center gap-1">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ $errors->first('password_confirmation') }}</span>
                </p>
            @endif
        </div>

        <!-- Submit -->
        <div class="pt-2">
            <button type="submit" 
                    class="w-full py-3 px-4 border border-transparent rounded-xl shadow-md text-white font-semibold text-sm hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition duration-150 ease-in-out"
                    style="background: linear-gradient(135deg, #07869a, #0a5b78);">
                Register
            </button>
        </div>
    </form>

    <!-- Login Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-600">
            Already registered? 
            <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-700 transition">
                Sign in instead
            </a>
        </p>
    </div>
</x-guest-layout>
