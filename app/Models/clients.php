<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;
    protected $table = 'clients'; // Nom de la table "clients"

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'nom_client',
        'num_cin',
        'num_tel',
        'mail',
    ];

    // public function admissions()
    // {
    //     return $this->hasMany(Admission::class, 'nom_client', 'nom_client');
    // }
}
