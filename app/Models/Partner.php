<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
