<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $fillable = [
        'agence_id',
        'destination_id',
        'titre',
        'description',
        'date_depart',
        'date_retour',
        'ville_depart',
        'quartier_depart',
        'adresse_depart',
        'prix',
        'places_disponibles',
        'image_url'
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    public function images()
    {
        return $this->hasMany(ImageVoyage::class);
    }
}