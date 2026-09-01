<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} — Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-background text-foreground font-sans antialiased">
        <x-admin-sidebar />
        <main class="transition-all duration-300 md:ml-[260px]">
            <!-- Page Heading -->
            @isset($header)
                <header class="border-b border-border px-6 py-5 md:px-8">
                    <div class="max-w-6xl">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <div class="px-6 py-8 md:px-8">
                {{ $slot }}
            </div>
        </main>
        @vite('resources/js/admin-sidebar.js')
    </body>
</html>
