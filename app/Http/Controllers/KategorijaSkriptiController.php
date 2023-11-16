<?php

namespace App\Http\Controllers;

use App\Models\ScriptCategory;
use Illuminate\Http\Request;

class ScriptCategoriesController extends Controller
{
    public function index()
    {
        return KategorijeSkripti::all();
    }


    public function create()
    {
        return view('scriptcategories.create'); 
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'script_id' => 'required|exists:scripts,id',
            'category_id' => 'required|exists:categories,id',
            
        ]);

        // Spremi novu kategoriju skripti u bazu
        ScriptCategory::create($validatedData);

        return redirect('/scriptcategories')->with('success', 'Kategorija skripti uspješno dodana.'); 
    }
    public function edit($id)
    {
        $scriptCategory = ScriptCategory::findOrFail($id);
        return view('scriptcategories.edit', compact('scriptCategory')); 
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'script_id' => 'required|exists:scripts,id',
            'category_id' => 'required|exists:categories,id',
            
        ]);

    
        $scriptCategory = ScriptCategory::findOrFail($id);
        $scriptCategory->update($validatedData);

        return redirect('/scriptcategories')->with('success', 'Kategorija skripti uspješno uređena.'); 
    }

    public function destroy($id)
    {
    
        $scriptCategory = ScriptCategory::findOrFail($id);
        $scriptCategory->delete();

        return redirect('/scriptcategories')->with('success', 'Kategorija skripti uspješno izbrisana.'); 
    }
}
