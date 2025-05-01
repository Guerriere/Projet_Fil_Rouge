<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'avis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'voyage_id',
        'note',
        'commentaire',
        'date_avis',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'note' => 'integer',
        'date_avis' => 'datetime',
    ];

    /**
     * Get the user associated with the avis.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the voyage associated with the avis.
     */
    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}