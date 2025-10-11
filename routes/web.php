<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $keyCreations = \App\Models\Portfolio::active()
        ->keyCreations()
        ->ordered()
        ->get();

    $otherProjects = \App\Models\Portfolio::active()
        ->otherProjects()
        ->ordered()
        ->get();

    return Inertia::render('Landing', [
        'keyCreations' => $keyCreations,
        'otherProjects' => $otherProjects
    ]);
})->name('home');

// Portfolio routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/api/portfolio/key-creations', [PortfolioController::class, 'keyCreations'])->name('portfolio.key-creations');
Route::get('/api/portfolio/other-projects', [PortfolioController::class, 'otherProjects'])->name('portfolio.other-projects');
