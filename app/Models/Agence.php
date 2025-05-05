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
        'accept_conditions',
    ];
}
