<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        // Genereer een unieke 5-cijferige code
        $code = rand(10000, 99999);

        // Zorg ervoor dat de code uniek is
        while (Quiz::where('code', $code)->exists()) {
            $code = rand(10000, 99999);
        }

        // Opslaan van de quiz in de database
        $quiz = Quiz::create([
            'name' => $request->input('name'),
            'code' => $code,
            'questions' => $request->input('questions'),
        ]);

        return response()->json([
            'message' => 'Quiz succesvol opgeslagen!',
            'quiz' => $quiz,
        ]);
    }
}
