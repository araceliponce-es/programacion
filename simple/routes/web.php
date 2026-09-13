<?php

use App\Http\Controllers\NavController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/abc', function () {
    return view('abc');
});



Route::get('/def', [NavController::class, 'index']);
