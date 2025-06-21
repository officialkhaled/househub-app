<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Renter extends Model
{
    protected $table = 'renters';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'nid',
    ];

    public function payments(): Builder|HasMany|Renter
    {
        return $this->hasMany(Payment::class);
    }

    public function renterFlatAssign(): Builder|HasMany|Renter
    {
        return $this->hasMany(RenterFlatAssign::class, 'renter_id', 'id');
    }
}
