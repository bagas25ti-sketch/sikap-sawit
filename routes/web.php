<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerlengkapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('perlengkapan', PerlengkapanController::class)
    ->parameters(['perlengkapan' => 'perlengkapan']);
