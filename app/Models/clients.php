<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $primaryKey = 'client_id';
    protected $fillable = [
        'client_id',
        'nom_client',
        'num_cin',
        'num_tel',
        'mail',
    ];

}
