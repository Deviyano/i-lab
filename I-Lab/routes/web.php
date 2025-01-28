<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return redirect()->route('inlog'); // Stuur door naar de nieuwe inlogpagina
});

Route::get('/inlog', function () {
    return view('inlog'); // Zorg dat je blade-bestand 'inlog.blade.php' heet
})->name('inlog');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return view('Dashboard');
})->name('dashboard');

Route::get('/quiz/create', function () {
    return view('QuizMaken');
})->name('quiz.create');

Route::get('/quiz', function () {
    return view('QuizStart');
})->name('quiz.index');

Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
Route::post('/quiz/save', [QuizController::class, 'store'])->name('quiz.save');


Route::get('/inlog-leerling', [LoginController::class, 'view_leerling'])->name('inlog.leerling.view');
Route::get('/dashboard/leraar', function () {
    return view('dashboard'); // Dit rendert dashboard.blade.php
})->name('inlog.leraar.view');

// Route voor I-lab medewerker naar het dashboard
Route::get('/dashboard/ilab', function () {
    return view('dashboard'); // Dit rendert dezelfde dashboard.blade.php
})->name('inlog.ilab.view');

Route::post('/check-code', [LoginController::class, 'checkCode'])->name('inlog.CheckCode');

Route::get('/team-naam/{quizId}', [LoginController::class, 'enterTeamName'])->name('inlog.EnterTeamName');
Route::post('/naar-quiz/{quizId}', [LoginController::class, 'startQuiz'])->name('quiz.startQuiz');

require __DIR__.'/auth.php';
