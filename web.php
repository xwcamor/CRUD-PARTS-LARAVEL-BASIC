<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;  // Import User controller
use App\Http\Controllers\CountryController;  // Import Country controller

// Route for default
Route::get('/', function () {
    return view('welcome');
});

// Route for users
Route::resource('users', UserController::class);
 
// Route for countries
Route::resource('countries', CountryController::class);
