<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
    {
        return Ocjene::all();
    }

    public function create()
    {
        return view('ratings.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ocjena' => 'required|numeric|min:1|max:5',
            'komentar' => 'required',
        ]);

        // Spremi novu ocjenu u bazu
        Rating::create($validatedData);

        return redirect('/ratings')->with('success', 'Ocjena uspješno dodana.'); 
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id); // Pronađi ocjenu po ID-u
        return view('ratings.edit', compact('rating')); // Prikazi obrazac za uređivanje ocjene
    }

    public function update(Request $request, $id)
    {
        // Validacija podataka iz zahtjeva
        $validatedData = $request->validate([
            'ocjena' => 'required|numeric|min:1|max:5',
            'komentar' => 'required',
            // Dodajte ostale potrebne validacije
        ]);

        // Ažuriraj ocjenu u bazi
        $rating = Rating::findOrFail($id);
        $rating->update($validatedData);

        return redirect('/ratings')->with('success', 'Ocjena uspješno uređena.'); 
    }

    public function destroy($id)
    {
        // Obriši ocjenu iz baze
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect('/ratings')->with('success', 'Ocjena uspješno izbrisana.'); 
    }
}
