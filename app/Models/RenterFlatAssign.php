<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RenterFlatAssign extends Model
{
    protected $table = 'renter_flat_assigns';

    protected $fillable = [
        'renter_id',
        'flat_id',
        'start_month',
        'end_month',
    ];

    protected $casts = [
        'start_month' => 'date',
        'end_month' => 'date',
    ];

    public function renter(): BelongsTo
    {
        return $this->belongsTo(Renter::class, 'renter_id')->withDefault();
    }

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class, 'flat_id')->withDefault();
    }
}
