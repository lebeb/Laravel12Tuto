<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\AddressController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', function () {
    return Inertia::render('Test', [
        'message' => 'Hello from Laravel 12!',
        'users' => ['Alice', 'Bob', 'Charlie']
    ]);
})->name('test');

Route::middleware('auth')->group(function () {
    // ... vos routes existantes

    Route::resource('addresses', AddressController::class);
});

require __DIR__ . '/settings.php';
