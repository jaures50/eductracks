<?php
// app/Http/Controllers/FormateurController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur;

class FormateurController extends Controller
{
    public function index()
    {
        $formateurs = Formateur::all();
        return view('formateurs.index', compact('formateurs'));
    }

    public function create()
    {
        return view('formateurs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:formateurs',
            'telephone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'specialite' => 'nullable|string|max:555',
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('formateurs', 'public');
            $validatedData['photo'] = $filePath;
        }

        Formateur::create($validatedData);

        return redirect()->route('formateurs.index')->with('success', 'Formateur ajouté avec succès');
    }

    public function show($id)
    {
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.show', compact('formateur'));
    }

    public function edit($id)
    {
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.edit', compact('formateur'));
    }

    public function update(Request $request, $id)
    {
        $formateur = Formateur::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:formateurs,email,' . $formateur->id,
            'telephone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialite' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('formateurs', 'public');
            $validatedData['photo'] = $filePath;
        }

        $formateur->update($validatedData);

        return redirect()->route('formateurs.index')->with('success', 'Formateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        $formateur = Formateur::findOrFail($id);
        $formateur->delete();

        return redirect()->route('formateurs.index')->with('success', 'Formateur supprimé avec succès');
    }
}
