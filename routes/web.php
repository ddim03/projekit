<?php

use App\Livewire\Home;
use App\Livewire\ProjectsByCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::redirect('/category', '/');

Route::get('/category/{slug}', ProjectsByCategory::class)->name('projets-by-category');

Route::get('tag/{slug}', function ($slug) {
    return;
})->name('tag');

Route::get('/login', function () {
    return;
})->name('login');

Route::get('/register', function () {
    return;
})->name('register');
