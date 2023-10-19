<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pieces extends Model
{
    use HasFactory;

    protected $fillable = [
        'piece_nom',
        'piece_prix',
        'piece_categorie',
        'piece_fabricant',
        'longueur_1',
        'longueur_2',
        'largeur_1',
        'largeur_2',
        'diametre_1',
        'diametre_2',
        'hauteur',
        'epaisseur',
        'poids',
        'image',
        'qte',
    ];
    
}
