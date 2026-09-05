<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Panel - foolstuck_') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#09090b] text-[#fafafa] font-sans antialiased min-h-screen relative flex items-center justify-center overflow-x-hidden p-4">
        <!-- Subtle Ambient Glow -->
        <div class="fixed top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-zinc-800/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10 space-y-6">
            <!-- Brand / Logo Header -->
            <div class="text-center space-y-2">
                <a href="/" class="inline-flex items-center gap-2 group">
                    <span class="font-mono text-xl font-bold tracking-tight text-foreground group-hover:text-muted-foreground transition-colors">
                        foolstuck_
                    </span>
                    <span class="rounded-full border border-zinc-700 bg-zinc-800/60 px-2 py-0.5 text-[10px] font-mono text-zinc-400">
                        Admin Portal
                    </span>
                </a>
            </div>

            <!-- Main Auth Card -->
            <div class="bg-zinc-900/90 border border-zinc-800 shadow-2xl backdrop-blur-md rounded-2xl p-7 sm:p-8 space-y-6">
                {{ $slot }}
            </div>

            <!-- Footer Link back to website -->
            <div class="text-center">
                <a href="/" class="inline-flex items-center gap-1.5 text-xs text-zinc-500 hover:text-zinc-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/>
                        <polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali ke Portofolio Utama
                </a>
            </div>
        </div>
    </body>
</html>
