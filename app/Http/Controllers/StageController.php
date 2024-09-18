<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Etudiant;
use App\Models\Formateur;
use App\Models\LieuStage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Affiche la liste des stages.
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index', compact('stages'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau stage.
     */
    public function create()
    {
        $etudiants = Etudiant::all();
        $lieux = LieuStage::all();
        $formateurs = Formateur::all();
        return view('stages.create', compact('etudiants', 'lieux', 'formateurs'));
    }

    /**
     * Stocke un nouveau stage dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'formateur_id' => 'required|exists:formateurs,id',
            'lieu_stage_id' => 'required|exists:lieux_stages,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'evaluation' => 'nullable|string',
        ]);

        Stage::create($validated);

        return redirect()->route('stages.index')->with('success', 'Stage créé avec succès.');
    }

    /**
     * Affiche le formulaire pour éditer un stage existant.
     */
    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        $etudiants = Etudiant::all();
        $formateurs = Formateur::all();
        $lieux = LieuStage::all();
        return view('stages.edit', compact('stage', 'etudiants', 'lieux'));
    }

    /**
     * Met à jour un stage existant dans la base de données.
     */
   

    /**
     * Supprime un stage de la base de données.
     */
    public function destroy($id)
    {
        $stage = Stage::findOrFail($id);
        $stage->delete();

        return redirect()->route('stages.index')->with('success', 'Stage supprimé avec succès.');
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'lieu_stage_id' => 'required|exists:lieux_stages,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'evaluation' => 'nullable|string',
        ]);

        $stage = Stage::find($id);
        $stage->etudiant_id = $request->etudiant_id;
        $stage->lieu_stage_id = $request->lieu_stage_id;
        $stage->date_debut = $request->date_debut;
        $stage->date_fin = $request->date_fin;
        $stage->evaluation = $request->evaluation;
        $stage->save();

        return redirect()->route('stages.index')->with('success', 'Stage mis à jour avec succès');
    }
}
