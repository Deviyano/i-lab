<?php

namespace App\Http\Controllers;

use App\Models\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\StudentResult;

class EvaluationsController extends Controller
{
    // Toon het overzicht van evaluaties
    public function index()
    {
        $evaluations = Evaluations::all();
        return view('evaluations', compact('evaluations'));
    }

    // Sla een nieuwe evaluatie op
    public function store(Request $request)
    {
        $request->validate([
            'vraag1' => 'required|string|max:255',
            'vraag2' => 'required|string|max:255',
            'vraag3' => 'required|string|max:255',
        ]);

        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Verstuur de e-mail als de gebruiker bestaat
        if ($user) {
            Mail::to($user->email)->send(new StudentResult($user));
        }

        // Sla de evaluatie correct op
        Evaluations::create([
            'vraag1' => $request->input('vraag1'),
            'vraag2' => $request->input('vraag2'),
            'vraag3' => $request->input('vraag3'),
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Evaluatie succesvol toegevoegd!');
    }
}
