<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExamCardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Routes untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes untuk kartu ujian (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ExamCardController::class, 'dashboard'])->name('dashboard');
    Route::get('/exam-card/create', [ExamCardController::class, 'create'])->name('exam-card.create');
    Route::post('/exam-card/generate', [ExamCardController::class, 'generate'])->name('exam-card.generate');
});