<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'numero_inscription',
        'email',
        'telephone',
        'adresse',
        'programme',
        'annee_entree',
        'photo'
    ];

    public function parcoursAcademiques()
    {
        return $this->hasMany(ParcoursAcademique::class);
    }


    public function conduite()
    {
        return $this->hasOne(Conduite::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class); // ou hasOne, selon la relation
    }
    


}
