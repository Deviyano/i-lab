<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/evaluations', function () {
    return view('evaluations');
})->middleware(['auth', 'verified'])->name('evaluations');

// Route::get('/quiz')

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/evaluations', [EvaluationsController::class, 'index'])->name('evaluations.index');
    Route::post('/evaluations', [EvaluationsController::class, 'store'])->name('evaluations.store');
});

require __DIR__.'/auth.php';



