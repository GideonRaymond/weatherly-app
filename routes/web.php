<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->middleware(RedirectIfAuthenticated::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);
