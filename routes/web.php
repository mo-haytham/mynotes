<?php

use App\Livewire\Note;
use App\Livewire\NoteCategory;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('categories', NoteCategory::class)->name('noteCategories');
Route::get('notes', Note::class)->name('notes');