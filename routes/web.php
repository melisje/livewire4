<?php

use App\Livewire\ChecklistManager;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checklists', ChecklistManager::class)->name('checklists.index');
});

require __DIR__.'/settings.php';
