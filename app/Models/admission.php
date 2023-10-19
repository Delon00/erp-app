<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admission extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'nom_client', 'nom_client');
    }

    protected $fillable = [
        'add_id',
        'nom_client',
        'nom_voiture',
        'marque_voiture',
        'panne_declare',
    ];
}
