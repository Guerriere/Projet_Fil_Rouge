<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'voyage_id',
        'user_id',
        'nom',
        'email',
        'telephone',
        'nombre_places',
        'montant_total',
        'statut',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_reservation' => 'datetime',
        'statut' => 'string',
    ];

    /**
     * Relation avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Voyage.
     */
    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }
    
    /**
     * Vérifie si la réservation est annulable.
     */
    public function estAnnulable()
    {
        // Une réservation est annulable si elle est en attente et que la date de départ est dans le futur
        return $this->statut === 'en_attente' && 
               Carbon::parse($this->voyage->date_depart)->isFuture();
    }
    
    /**
     * Vérifie si la réservation est à venir.
     */
    public function estAVenir()
    {
        return Carbon::parse($this->voyage->date_depart)->isFuture();
    }
    
    /**
     * Vérifie si la réservation est passée.
     */
    public function estPassee()
    {
        return Carbon::parse($this->voyage->date_depart)->isPast();
    }
    
    /**
     * Génère un numéro de référence pour la réservation.
     */
    public function getReference()
    {
        return 'TC-' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }
}