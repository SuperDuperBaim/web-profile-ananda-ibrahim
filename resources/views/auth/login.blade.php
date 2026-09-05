<x-guest-layout>
    <div class="space-y-1 text-left">
        <h1 class="text-xl font-bold text-zinc-100">Selamat Datang Kembali</h1>
        <p class="text-xs text-zinc-400">Masuk untuk mengelola portofolio & pengalaman kamu</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-emerald-400 text-xs" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4 pt-2">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-semibold text-zinc-300">
                Email
            </label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="baim@admin.com"
                class="w-full rounded-xl bg-zinc-950/80 border border-zinc-800 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition-colors"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Password -->
        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-semibold text-zinc-300">
                Password
            </label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                placeholder="••••••••"
                class="w-full rounded-xl bg-zinc-950/80 border border-zinc-800 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition-colors"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-xs pt-1">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer select-none">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember" 
                    class="rounded border-zinc-700 bg-zinc-950 text-zinc-100 focus:ring-0 focus:ring-offset-0 cursor-pointer"
                >
                <span class="text-zinc-400 hover:text-zinc-300 transition-colors">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-zinc-500 hover:text-zinc-300 transition-colors" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button 
                type="submit"
                class="w-full rounded-xl bg-foreground text-background py-2.5 text-xs font-bold uppercase tracking-wider hover:bg-foreground/90 shadow-lg transition-all active:scale-[0.99]"
            >
                Masuk ke Dashboard
            </button>
        </div>
    </form>
</x-guest-layout>
