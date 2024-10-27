<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeasiswaRegistrationController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('beasiswa-registrations/view', [BeasiswaRegistrationController::class, 'view'])->name('beasiswa-registrations.view');

Route::resource('beasiswa-registrations', BeasiswaRegistrationController::class)->name('*', 'beasiswa-registrations');

Route::get('/file/{fileName}', [FileController::class, 'showFile'])->name('file.show');