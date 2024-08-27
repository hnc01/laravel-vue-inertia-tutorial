<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Home');
//})->name('home');

Route::inertia('/', 'Home')->name('home');

Route::inertia('/register', 'Auth/Register')->name('register.show');
Route::post('/register', RegisterController::class)->name('register.store');

Route::inertia('/login', 'Auth/Login')->name('login.show');
Route::post('/login', LoginController::class)->name('login.store');

//Route::get('/about', function () {
//    // same as Inertia::render
//    return inertia('About', ['user' => 'Mike']);
//});

// shorthand for writing the above
//Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');
