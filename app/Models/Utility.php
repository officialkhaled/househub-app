<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Utility extends Model
{
    protected $table = 'utilities';

    protected $fillable = [
        'flat_id',
        'name',
        'amount',
        'status',
    ];

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class, 'flat_id')->withDefault();
    }
}
