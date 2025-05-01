<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paiement';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_id',
        'montant',
        'methode_paiement',
        'statut',
        'date_paiement',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'montant' => 'float',
        'date_paiement' => 'datetime',
        'statut' => 'string',
        'methode_paiement' => 'string',
    ];

    /**
     * Get the reservation associated with the paiement.
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}