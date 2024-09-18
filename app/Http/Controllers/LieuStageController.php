<?php

namespace App\Http\Controllers;

use App\Models\LieuStage;
use Illuminate\Http\Request;

class LieuStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lieux_stages = LieuStage::all();
        return view('lieux_stages.index', compact('lieux_stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lieux_stages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        LieuStage::create($request->all());

        return redirect()->route('lieux_stages.index')->with('success', 'Lieu de stage créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LieuStage $lieuStage)
    {
        return view('lieux_stages.show', compact('lieuStage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Utiliser le modèle LieuStage pour trouver l'enregistrement par ID
        $lieuStage = LieuStage::findOrFail($id);

        // Passer le modèle à la vue
        return view('lieux_stages.edit', compact('lieuStage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Trouver le LieuStage par ID
        $lieuStage = LieuStage::findOrFail($id);

        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        // Mise à jour du modèle
        $lieuStage->update($request->all());

        return redirect()->route('lieux_stages.index')->with('success', 'Lieu de stage mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver le LieuStage par ID
        $lieuStage = LieuStage::findOrFail($id);

        // Suppression du modèle
        $lieuStage->delete();
        return redirect()->route('lieux_stages.index')->with('success', 'Lieu de stage supprimé avec succès.');
    }
}
