<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuStage extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si ce n'est pas le nom par défaut
    protected $table = 'lieux_stages';

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'pays',
        'contact',
    ];

    // Les attributs qui ne peuvent pas être assignés en masse
    protected $guarded = [];
}
