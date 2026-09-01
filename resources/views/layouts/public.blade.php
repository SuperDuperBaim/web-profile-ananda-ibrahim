<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('portfolio.site.name', 'Portfolio') }} — {{ config('portfolio.site.title', '') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-background text-foreground font-sans antialiased">
        <x-sidebar :site="$site" :nav-items="$navItems" />
        <main class="transition-all duration-300 md:ml-[260px]">
            @yield('content')
        </main>
        @vite('resources/js/sidebar.js')
    </body>
</html>
