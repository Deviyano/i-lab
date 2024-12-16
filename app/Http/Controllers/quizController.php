<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use Illuminate\Http\Request;

class quizController extends Controller
{
    public function quiz_vraag()
    {
        // Haal alle gegevens op uit de tabel 'Opdrachten'
        $opdrachten = Opdracht::all();
        $vraag = '';

        // Stuur de gegevens door naar de view
        return view('quiz_vraag', [
            'vraag' => $vraag,
            'opdrachten' => $opdrachten
        ]);
    }

    public function get_question($id)
    {
        // Haal één specifieke opdracht op waar quiz_id gelijk is aan $id
        $vraag = Opdracht::where('quiz_id', $id)->first();
    
        // Haal alle opdrachten op
        $opdrachten = Opdracht::all();
    
        // Stuur de gegevens door naar de view
        return view('quiz_vraag', [
            'vraag' => $vraag,
            'opdrachten' => $opdrachten
        ]);
    }
    
}
