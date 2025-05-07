<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'agence_id',
        'destination_depart_id',
        'destination_arrive_id',
        'date_depart',
        'heure_depart',
        'montant',
        'nbre_place',
        'statut',
    ];

    /**
     * Relation avec le modèle Agence.
     */
    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    /**
     * Relation avec la destination de départ.
     */
    public function destinationDepart()
    {
        return $this->belongsTo(Destination::class, 'destination_depart_id');
    }

    /**
     * Relation avec la destination d'arrivée.
     */
    public function destinationArrive()
    {
        return $this->belongsTo(Destination::class, 'destination_arrive_id');
    }
    
    /**
     * Relation avec les réservations.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    /**
     * Vérifie si le voyage est complet (plus de places disponibles).
     */
    public function estComplet()
    {
        return $this->nbre_place <= 0;
    }
    
    /**
     * Vérifie si le voyage est à venir.
     */
    public function estAVenir()
    {
        return now()->startOfDay()->lte(\Carbon\Carbon::parse($this->date_depart));
    }
}