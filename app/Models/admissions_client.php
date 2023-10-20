<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;
use App\Models\Admission;

class admissions_client extends Model
{
    use HasFactory;


    protected $table = 'admissions_clients';
    public $timestamps = true;

    protected $fillable =[
        'add_id',
        'client_id',
    ];


    public function admission()
    {
        return $this->belongsTo(Admission::class, 'add_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
