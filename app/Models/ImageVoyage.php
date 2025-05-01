<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageVoyage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images_voyages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voyage_id',
        'url_image',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'url_image' => 'string',
        'description' => 'string',
    ];

    /**
     * Get the voyage associated with the image.
     */
    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}