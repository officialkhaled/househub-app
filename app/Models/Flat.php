<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'status',
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id')->withDefault();
    }
}
