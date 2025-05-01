<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\MustVerifyEmail;
    
class Agency extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'phone',
        'password',
        'agency_name',
        'agency_type',
        'description',
        'city',
        'district',
        'address',
        'regions',
        'website',
        'founding_year',
        'license_number',
        'employees',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'logo',
        'gallery',
        'services',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'regions' => 'array',
        'gallery' => 'array',
        'services' => 'array',
    ];
}

