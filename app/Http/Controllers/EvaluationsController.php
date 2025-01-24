<?php
namespace App\Http\Controllers;

use App\Models\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        ], [
            'vraag1.required' => 'dit veld moet ingevuld worden.',
            'vraag2.required' => 'dit veld moet ingevuld worden.',
            'vraag3.required' => 'dit veld moet ingevuld worden.',
        ]);
    
        
        Evaluations::create($request->all());

        Mail::to($user->email)->send(new StudentResult($user));

        return redirect()->route('evaluations.index')->with('success', 'Evaluatie succesvol toegevoegd!');
    }
}
