<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return Korisnik::all();
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validacija podataka iz zahtjeva
        $validatedData = $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'email' => 'required|email|unique:users',
            'lozinka' => 'required',
        ]);

        // Spremi novog korisnika u bazu
        User::create($validatedData);

        return redirect('/users')->with('success', 'Korisnik uspješno dodan.'); 
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Pronađi korisnika po ID-u
        return view('users.edit', compact('user')); // Prikazi obrazac za uređivanje korisnika
    }

    public function update(Request $request, $id)
    {
    
        $validatedData = $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'lozinka' => 'required',
        ]);

        // Ažuriraj korisnika u bazi
        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect('/users')->with('success', 'Korisnik uspješno uređen.');
    }

    public function destroy($id)
    {
        // Obriši korisnika iz baze
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Izbrisano'); 
    }
}
