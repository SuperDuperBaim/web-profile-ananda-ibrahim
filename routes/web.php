<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'site' => config('portfolio.site'),
        'navItems' => config('portfolio.navItems'),
        'experiences' => \App\Models\Experience::all(),
        'projects' => \App\Models\Portfolio::all(),
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
});

require __DIR__.'/auth.php';
