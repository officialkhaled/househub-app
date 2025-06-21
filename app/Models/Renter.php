<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $table = 'renters';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'nid',
    ];
}
