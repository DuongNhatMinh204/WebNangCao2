<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
})->name('home');

// Route cho trang flight
Route::get('/flight',function(){
    return view('flight');
} )->name('flight');

// Route cho trang gallery
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');


Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/trending', function () {
    return view('trending');
})->name('trending');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/package', function () {
    return view('package');
})->name('package');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/review', function () {
    return view('review');
})->name('review');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/plan-trip', function () {
    return view('plan-trip');
})->name('plan-trip');
Route::get('/user', function () {
    return view('user');
})->name('user');