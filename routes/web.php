<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule');


