<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return Inertia::render('Home');
//})->name('home');

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', RegisterController::class);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', LoginController::class);
});

//Route::get('/about', function () {
//    // same as Inertia::render
//    return inertia('About', ['user' => 'Mike']);
//});

// shorthand for writing the above
//Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');
