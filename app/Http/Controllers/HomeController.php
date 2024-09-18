<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant; // Assurez-vous que ce modèle est importé

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('home', compact('etudiants'));
    }
    
}
