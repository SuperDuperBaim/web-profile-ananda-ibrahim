<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Meta Utama SEO -->
        <title>Ananda Ibrahim Hilal Syafrudin (baimhilal) - Personal Portfolio</title>
        <meta name="description" content="Website dan portofolio resmi Ananda Ibrahim Hilal Syafrudin (Ananda Ibrahim / baim hilal / foolstuck_). Mahasiswa Teknologi Informasi Universitas Darma Persada (Unsada).">
        <meta name="keywords" content="Ananda Ibrahim, Ananda ibrahim hilal syafrudin, baim hilal, baimhilal, foolstuck_, unsada, universitas darma persada">
        <meta name="author" content="Ananda Ibrahim Hilal Syafrudin">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="https://anandaibrahimhs.web.id">

        <!-- Open Graph / WhatsApp, Facebook, Instagram -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://anandaibrahimhs.web.id">
        <meta property="og:title" content="Ananda Ibrahim Hilal Syafrudin (baimhilal / foolstuck_)">
        <meta property="og:description" content="Portofolio Ananda Ibrahim Hilal Syafrudin, mahasiswa IT Universitas Darma Persada (Unsada).">
        <meta property="og:image" content="https://anandaibrahimhs.web.id/images/og-image.jpg">
        <meta property="og:site_name" content="Ananda Ibrahim Hilal Syafrudin">

        <!-- Twitter / X Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@foolstuck_">
        <meta name="twitter:creator" content="@foolstuck_">
        <meta name="twitter:url" content="https://anandaibrahimhs.web.id">
        <meta name="twitter:title" content="Ananda Ibrahim Hilal Syafrudin (baim hilal)">
        <meta name="twitter:description" content="Portofolio Ananda Ibrahim Hilal Syafrudin, mahasiswa IT Universitas Darma Persada (Unsada).">
        <meta name="twitter:image" content="https://anandaibrahimhs.web.id/images/og-image.jpg">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-background text-foreground font-sans antialiased">
        <x-sidebar :site="$site" :nav-items="$navItems" />
        <main id="main-content" class="transition-[margin] duration-300 ease-in-out pt-14 md:pt-0" style="margin-left:0">
            @yield('content')
        </main>
        @vite('resources/js/sidebar.js')
    </body>
</html>
