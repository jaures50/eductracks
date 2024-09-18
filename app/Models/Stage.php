<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'formateur_id',
        'lieu_stage_id',
        'date_debut',
        'date_fin',
        'evaluation',
    ];

    // Définir la relation avec le modèle Etudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Définir la relation avec le modèle LieuStage
    public function lieuStage()
    {
        return $this->belongsTo(LieuStage::class, 'lieu_stage_id');
    }
    // Définir la relation avec le modèle formateur
    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'formateur_id');
    }
}
