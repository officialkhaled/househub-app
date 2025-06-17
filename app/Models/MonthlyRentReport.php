<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonthlyRentReport extends Model
{
    protected $table = 'monthly_rent_reports';

    protected $fillable = [
        'building_id',
        'floor_id',
        'flat_id',
        'renter_id',
        'month',
        'rent_fee',
        'total_utilities',
        'total_amount',
        'previous_due',
        'previous_advance',
        'amount_paid',
        'due_amount',
        'advance_balance',
        'status',
        'note',
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id')->withDefault();
    }

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class, 'flat_id')->withDefault();
    }

    public function renter(): BelongsTo
    {
        return $this->belongsTo(Renter::class, 'renter_id')->withDefault();
    }
}
