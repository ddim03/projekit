<?php

use App\Livewire\Home;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('category/{slug}', function($slug) {
    return;
})->name('category');
Route::get('tag/{slug}', function($slug) {
    return;
})->name('tag');

Route::get('/login', function () {
    return;
})->name('login');

Route::get('/register', Register::class)->name('register')->middleware('guest');
