<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class LoginController extends Controller
{
    public function view_leerling()
    {
        return view('inlog_pagina_leerling');
    }

    public function view_leraar()
    {
        return view('inlog_pagina_leraar');
    }

    public function view_ilab()
    {
        return view('inlog_pagina_leraar');
    }

    public function checkCode(Request $request)
    {
        $request->validate([
            'quizId' => 'required|string|max:6',
        ]);

        $quizId = $request->input('quizId');

        $quiz = Quiz::where('code', $quizId)->first();
        

        if (!$quiz) {
            return redirect()->back()->withErrors(['quizId' => 'Code is ongeldig of bestaat niet.']);
        }

        return redirect()->route('quiz.start', ['quiz' => $quiz->id]);
    }
}
