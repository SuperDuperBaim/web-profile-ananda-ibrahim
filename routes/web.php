<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $experiences = collect();
    $projects = collect();

    try {
        $experiences = \App\Models\Experience::all();
    } catch (\Throwable $e) {
        // Fallback jika database belum dikonfigurasi
    }

    if ($experiences->isEmpty()) {
        $experiences = collect(config('portfolio.experiences', []))->map(fn($item) => (object) $item);
    }

    try {
        $projects = \App\Models\Portfolio::all();
    } catch (\Throwable $e) {
        // Fallback jika database belum dikonfigurasi
    }

    if ($projects->isEmpty()) {
        $projects = collect(config('portfolio.projects', []))->map(function ($item) {
            $obj = (object) $item;
            if (!isset($obj->title) && isset($obj->name)) {
                $obj->title = $obj->name;
            }
            if (!isset($obj->link) && isset($obj->demo)) {
                $obj->link = $obj->demo;
            }
            return $obj;
        });
    }

    return view('home', [
        'site' => config('portfolio.site'),
        'navItems' => config('portfolio.navItems'),
        'experiences' => $experiences,
        'projects' => $projects,
        'skillGroups' => config('portfolio.skillGroups'),
        'contactLinks' => config('portfolio.contactLinks'),
    ]);
})->middleware(\App\Http\Middleware\TrackVisitor::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $visitorCount = \App\Models\Visitor::count();
        return view('dashboard', compact('visitorCount'));
    })->name('dashboard');

    Route::resource('portfolios', PortfolioController::class);
    Route::resource('experiences', ExperienceController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

require __DIR__.'/auth.php';
