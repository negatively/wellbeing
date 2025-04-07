<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WellbeingController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\SelfDevelopmentController;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('wellbeings', WellbeingController::class)->only('index');
    Route::resource('moods', MoodController::class);
    Route::resource('self_developments', SelfDevelopmentController::class)->only('index');


});

require __DIR__.'/auth.php';
