<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return Kategorije::all();
    }


    public function create()
    {
        return view('categories.create'); 
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'naziv' => 'required|unique:categories',
        
        ]);

        // Spremi novu kategoriju u bazu
        Category::create($validatedData);

        return redirect('/categories')->with('success', 'Kategorija uspješno dodana.'); // Preusmjeri na popis kategorija s porukom o uspjehu
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id); // Pronađi kategoriju po ID-u
        return view('categories.edit', compact('category')); // Prikazi obrazac za uređivanje kategorije
    }

    public function update(Request $request, $id)
    {
    
        $validatedData = $request->validate([
            'naziv' => 'required|unique:categories,naziv,' . $id,
            
        ]);

        
        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect('/categories')->with('success', 'Kategorija uspješno uređena.'); // Preusmjeri na popis kategorija s porukom o uspjehu
    }

    public function destroy($id)
    {
        
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Kategorija uspješno izbrisana.'); // Preusmjeri na popis kategorija s porukom o uspjehu
    }
}