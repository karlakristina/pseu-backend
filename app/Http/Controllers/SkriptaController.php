<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;

class ScriptsController extends Controller
{
    public function index()
    {
        return Skripte::all();
    }
   

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'naslov' => 'required',
            'opis' => 'required',
            'datoteka' => 'required', 
        ]);

        
        Script::create($validatedData);

        return redirect('/skripte')->with('success', 'Skripta uspješno dodana.'); // Preusmjeri na popis skripti s porukom o uspjehu
    }

    public function edit($id)
    {
        $script = Script::findOrFail($id); // Pronađi skriptu po ID-u
        return view('skripte.edit', compact('script')); // Prikazi obrazac za uređivanje skripte
    }

    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'naslov' => 'required',
            'opis' => 'required',
            'datoteka' => 'required',
        ]);

        // Ažuriraj skriptu u bazi
        $script = Script::findOrFail($id);
        $script->update($validatedData);

        return redirect('/skripte')->with('success', 'Skripta uspješno uređena.'); 
    }

    public function destroy($id)
    {
        
        $script = Script::findOrFail($id);
        $script->delete();

        return redirect('/skripte')->with('success', 'Skripta uspješno izbrisana.'); 
}
}