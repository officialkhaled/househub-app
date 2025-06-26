<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flat extends Model
{
    protected $table = 'flats';

    protected $fillable = [
        'building_id',
        'floor_id',
        'name',
        'number_of_rooms',
        'sqft_size',
        'rent_fee',
        'description',
        'thumbnail_image',
        'gallery_images',
        'status',
    ];

    protected $casts = [
        'gallery_images' => Json::class,
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id')->withDefault();
    }

    public function utilities(): HasMany
    {
        return $this->hasMany(Utility::class, 'flat_id', 'id');
    }
}
