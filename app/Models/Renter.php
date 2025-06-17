<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Renter extends Model
{
    protected $table = 'renters';

    protected $fillable = [
        'flat_id',
        'name',
        'phone',
        'email',
        'nid',
        'start_month',
        'end_month',
    ];

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class, 'flat_id')->withDefault();
    }
}
