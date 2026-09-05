<?php

return [
    'site' => [
        'name' => 'Ananda Ibrahim',
        'fullName' => 'Ananda Ibrahim Hilal Syafrudin',
        'title' => 'Web & Mobile Developer',
        'summary' => 'Mahasiswa Teknologi Informasi di Universitas Darma Persada yang tertarik dalam merancang serta mengembangkan aplikasi web dan mobile.',
        'intro' => 'Mahasiswa Teknologi Informasi di Universitas Darma Persada yang tertarik dalam merancang serta mengembangkan aplikasi web dan mobile.',
        'about' => 'Nama saya Ananda Ibrahim Hilal Syafrudin, Mahasiswa S1 Teknologi Informasi di Universitas Darma Persada. Saya tertarik dengan bagaimana teknologi bekerja, pengembangan aplikasi, dan pembuatan produk digital.',
    ],

    'navItems' => [
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'Experience', 'href' => '#experience'],
        ['label' => 'Projects', 'href' => '#projects'],
        ['label' => 'Skills', 'href' => '#skills'],
        ['label' => 'Contact', 'href' => '#contact'],
    ],

    'experiences' => [
        [
            'period' => '2026',
            'role' => 'Frontend Developer',
            'company' => 'Badan Pemeriksaan Keuangan Republik Indonesia',
            'description' => 'Merancang frontend Bidics News pada aplikasi BPK GO',
            'tech' => ['Flutter', 'MySql', 'Laravel'],
        ],
    ],

    'projects' => [
        [
            'name' => 'Kasir UMKM',
            'title' => 'Kasir UMKM',
            'description' => 'Aplikasi kasir offline-first untuk UMKM — mengelola produk, kategori, pembayaran QRIS dan tunai, serta laporan penjualan.',
            'tech' => ['React', 'SQLite', 'Electron'],
            'github' => 'https://github.com/SuperDuperBaim',
            'demo' => null,
            'link' => null,
            'accent' => 'from-zinc-200 to-zinc-300 dark:from-zinc-800 dark:to-zinc-700',
        ],
        [
            'name' => 'Website Portfolio',
            'title' => 'Website Portfolio',
            'description' => 'Portfolio single-page ini dibangun dengan Laravel, Blade template, Tailwind CSS dengan sidebar navigasi dan smooth scroll.',
            'tech' => ['Laravel', 'Blade', 'Tailwind CSS'],
            'github' => 'https://github.com/SuperDuperBaim',
            'demo' => '/',
            'link' => '/',
            'accent' => 'from-zinc-200 to-zinc-300 dark:from-zinc-800 dark:to-zinc-700',
        ],
    ],

    'skillGroups' => [
        [
            'title' => 'Frontend',
            'skills' => ['HTML', 'CSS', 'Tailwind CSS', 'Next.js', 'Flutter'],
        ],
        [
            'title' => 'Backend',
            'skills' => ['PHP', 'Laravel'],
        ],
        [
            'title' => 'Database',
            'skills' => ['MySQL', 'SQLite'],
        ],
        [
            'title' => 'Tools',
            'skills' => ['Git', 'GitHub', 'VS Code', 'Figma'],
        ],
    ],

    'contactLinks' => [
        [
            'label' => 'Email',
            'value' => 'anandaibrahimhs@gmail.com',
            'href' => 'mailto:anandaibrahimhs@gmail.com',
            'type' => 'mail',
        ],
        [
            'label' => 'GitHub',
            'value' => 'github.com/SuperDuperBaim',
            'href' => 'https://github.com/SuperDuperBaim',
            'type' => 'github',
        ],
        [
            'label' => 'LinkedIn',
            'value' => 'linkedin.com/ananda-ibrahim',
            'href' => 'https://www.linkedin.com/in/ananda-ibrahim-hilal-syafrudin-4624a4393/',
            'type' => 'linkedin',
        ],
    ],
];
