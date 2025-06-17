<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Floor extends Model
{
    protected $table = 'floors';

    protected $fillable = [
        'building_id',
        'floor_number',
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }
}
