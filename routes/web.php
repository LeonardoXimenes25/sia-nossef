<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/konaba-ami', function () {
    return view('pages.about');
})->name('about');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule');

// teachears
// Daftar semua guru
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

// Detail guru per ID
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
