<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'voyage_id',
        'nombre_personnes',
        'statut',
        'date_reservation',
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
     * Get the user associated with the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the voyage associated with the reservation.
     */
    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }
}