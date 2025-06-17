<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flat extends Model
{
    protected $table = 'flats';

    protected $fillable = [
        'floor_id',
        'name',
        'number_of_rooms',
        'sqft_size',
        'rent_fee',
        'status',
    ];

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id')->withDefault();
    }
}
