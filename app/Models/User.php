<?php

/**
 * @method bool isAdmin()
 * @method bool isPartner()
 * @method bool isClient()
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'adresse',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'string',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is a partner.
     *
     * @return bool
     */
    public function isPartner()
    {
        return $this->role === 'partenaire';
    }

    /**
     * Check if the user is a client.
     *
     * @return bool
     */
    public function isClient()
    {
        return $this->role === 'client';
    }

    /**
     * Define the relationship with the Reservation model.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    /**
     * Define the relationship with the Avis model.
     */
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}


