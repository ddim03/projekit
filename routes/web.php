<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('category/{slug}', function($slug) {
    return;
})->name('category');
