<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/abc', function () {
    return view('abc');
});



Route::get('/def', function () {
    return view('def');
});
