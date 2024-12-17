<?php
namespace App\Http\Controllers;

use App\Models\Evaluations;
use Illuminate\Http\Request;

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
            'vraag3' => 'required|integer|min:1|max:5',
        ]);

        Evaluations::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluatie succesvol toegevoegd!');
    }
}

