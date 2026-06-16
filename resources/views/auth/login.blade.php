<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold font-heading text-slate-800">Welcome Back</h2>
        <p class="text-sm text-slate-500 mt-1">Please enter your credentials to access your portal</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm rounded-xl flex items-center gap-2">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

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
                       autofocus 
                       autocomplete="username"
                       placeholder="you@example.com"
                       class="block w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
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
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-teal-600 hover:text-teal-700 transition" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="relative rounded-xl shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="bi bi-lock"></i>
                </div>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="current-password"
                       placeholder="••••••••"
                       class="block w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-teal-500 focus:ring-opacity-15 focus:border-teal-500 transition duration-150 ease-in-out" />
            </div>
            @if ($errors->has('password'))
                <p class="text-xs text-rose-500 mt-1 flex items-center gap-1">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ $errors->first('password') }}</span>
                </p>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" 
                   type="checkbox" 
                   name="remember"
                   class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-slate-300 rounded transition duration-150 ease-in-out" />
            <label for="remember_me" class="ml-2 block text-sm text-slate-600 select-none">
                Remember my session
            </label>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit" 
                    class="w-full py-3 px-4 border border-transparent rounded-xl shadow-md text-white font-semibold text-sm hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition duration-150 ease-in-out"
                    style="background: linear-gradient(135deg, #07869a, #0a5b78);">
                Sign In
            </button>
        </div>
    </form>

    <!-- Register Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-600">
            New to Alees Medical? 
            <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-700 transition">
                Create an account
            </a>
        </p>
    </div>
</x-guest-layout>
