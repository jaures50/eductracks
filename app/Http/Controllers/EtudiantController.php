<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;


use App\Models\Stage; // Ajoute ce modèle si tu l'utilises pour compter les stages
use App\Models\LieuStage;
use App\Models\Formateur; // Ajoute ce modèle si tu l'utilises pour compter les formateurs


class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        $totalInscrits = Etudiant::count();

        return view('etudiants.index', compact('etudiants', 'totalInscrits'));
    }
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $stage = $etudiant->stages()->latest()->first(); // Récupère le dernier stage ou adapte selon tes besoins

        return view('etudiants.show', compact('etudiant', 'stage'));
    }

    public function create()
    {
        return view('etudiants.create');
    }
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }


    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_inscription' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'programme' => 'required|string|max:255',
            'annee_entree' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);

        // Mettre à jour les informations de l'étudiant
        $etudiant->nom = $validatedData['nom'];
        $etudiant->prenom = $validatedData['prenom'];
        $etudiant->date_naissance = $validatedData['date_naissance'];
        $etudiant->numero_inscription = $validatedData['numero_inscription'];
        $etudiant->email = $validatedData['email'];
        $etudiant->telephone = $validatedData['telephone'];
        $etudiant->adresse = $validatedData['adresse'];
        $etudiant->programme = $validatedData['programme'];
        $etudiant->annee_entree = $validatedData['annee_entree'];

        // Traitement de la photo si elle est uploadée
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $etudiant->photo = basename($photoPath);
        }

        // Sauvegarder les changements
        $etudiant->save();

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);

        // Supprimer l'étudiant
        $etudiant->delete();

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'numero_inscription' => 'required|unique:etudiants',
            'email' => 'required|email|unique:etudiants',
            'programme' => 'required',
            'annee_entree' => 'required|integer',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }



    public function nbr()
    {
        $totalInscrits = Etudiant::count();
        $totalStages = Stage::count();
        $totalFormateurs = Formateur::count();
        $totallieux_stages = LieuStage::count();

        return view('nbrtotal', compact('totalInscrits', 'totalStages', 'totalFormateurs', 'totallieux_stages'));
    }
}
