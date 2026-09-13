<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'abc')->name('home');
Route::inertia('/dashboard', 'dashboard')->name('dashboard');

// Route::inertia('/def', 'def')->name('hidef');

Route::get('/def', function () {
    return inertia('def', [
        'isAdmin' => 15<10, //no tengo auth
    ]);
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::inertia('dashboard', 'dashboard')->name('dashboard');
// });

require __DIR__.'/settings.php';
