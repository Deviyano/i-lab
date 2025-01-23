<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inlog-leerling', [LoginController::class, 'view_leerling'])->name('inlog.leerling.view');
Route::get('/inlog-leraar', [LoginController::class, 'view_leraar'])->name('inlog.leraar.view');
Route::get('/inlog-ilab', [LoginController::class, 'view_ilab'])->name('inlog.ilab.view');


Route::post('/check-code', [LoginController::class, 'checkCode'])->name('inlog.CheckCode');

Route::post('/team-naam/{quizId}', [LoginController::class, 'enterTeamName'])->name('inlog.EnterTeamName');
Route::post('/naar-quiz/{quizId}', [LoginController::class, 'startQuiz'])->name('quiz.startQuiz');


require __DIR__.'/auth.php';
