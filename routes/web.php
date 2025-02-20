<?php

use App\Livewire\FavoriteProjects;
use App\Livewire\Home;
use App\Livewire\ProjectsByCategory;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::redirect('/category', '/');

Route::get('/category/{slug}', ProjectsByCategory::class)->name('projets-by-category');

Route::get('/project/user', function () {
    return;
})->name('projects-by-user');

Route::get('/project/favorite', FavoriteProjects::class)->name('favorite');

Route::get('tag/{slug}', function ($slug) {
    return;
})->name('tag');

Route::get('/login', function () {
    return;
})->name('login');

Route::get('/register', Register::class)->name('register')->middleware('guest');
