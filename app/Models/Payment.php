<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'renter_id',
        'flat_id',
        'month',
        'payment_date',
        'amount',
        'note',
    ];

    protected $casts = [
        'month' => 'date',
        'payment_date' => 'date',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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
