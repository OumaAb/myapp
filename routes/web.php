<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\JustificationController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/designations/create', [DesignationController::class, 'create'])->name('designations.create');
    Route::post('/designations', [DesignationController::class, 'store'])->name('designations.store');
    Route::get('/justification/create', [JustificationController::class, 'create'])->name('justification.create');
    Route::post('/justification', [JustificationController::class, 'store'])->name('justifications.store');
});

