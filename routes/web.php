<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Home');
//})->name('home');

Route::inertia('/', 'Home')->name('home');
Route::inertia('/register', 'Auth/Register')->name('register');

//Route::get('/about', function () {
//    // same as Inertia::render
//    return inertia('About', ['user' => 'Mike']);
//});

// shorthand for writing the above
//Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');
