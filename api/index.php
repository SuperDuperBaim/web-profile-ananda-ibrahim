<?php

// Pastikan direktori temporary storage untuk view & cache di Vercel Serverless tersedia
$tmpDirs = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/sessions',
    '/tmp/logs',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Forward request ke public/index.php milik Laravel
require __DIR__ . '/../public/index.php';
