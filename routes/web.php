<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

Route::get('/inlog-leerling', [LoginController::class, 'view_leerling'])->name('inlog.leerling.view');
Route::get('/inlog-leraar', [LoginController::class, 'view_leraar'])->name('inlog.leraar.view');
Route::get('/inlog-ilab', [LoginController::class, 'view_ilab'])->name('inlog.ilab.view');

Route::post('/check-code', [LoginController::class, 'checkCode'])->name('check.code');


require __DIR__.'/auth.php';
