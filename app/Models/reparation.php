<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class reparation extends Model
{
    use HasFactory;
    protected $fillable = ['date_ajout', 'date_estimee'];

    protected $appends = ['temps_restant'];

    public function getTempsRestantAttribute()
    {
        $dateAjout = $this->date_ajout;
        $dateEstimee = $this->date_estimee;
        return $dateAjout->diffInMinutes($dateEstimee);
    }
    public function getNbrePanneRestantAttribute()
    {
        return $this->nbre_panne - $this->nbre_panne_traite;
    }
    public function getMontantAttribute()
    {
        return $this->montant_total - $this->montant_paye;
    }

}
