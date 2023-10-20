<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'add_id',
        'nom_voiture',
        'marque_voiture',
        'panne_declare',
    ];
}
