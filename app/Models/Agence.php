<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        
        'user_id',
        'email_pro',
        'phone_pro',
        'agency_name',
        'agency_type',
        'agency_photo',
        'agency_logo',
        'accept_conditions',
    ];
    
    /**
     * Relation avec le modèle User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relation avec le modèle Voyage
     */
    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }
}
