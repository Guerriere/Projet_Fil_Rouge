<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agence extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'email',
        'user_id',
        'telephone',
        'Ville',
        'gallery',
        'site_web',
        'regions',
        'founding_year',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'logo_url',
        'terms_accepted',
    ];

    /**
     * The attributes that should be hidden for arrays.
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
        'password' => 'hashed',
        'gallery' => 'array',
        'regions' => 'array',
        'founding_year' => 'integer',
        'terms_accepted' => 'boolean',
    ];

    /**
     * Get the user that owns the agency.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
