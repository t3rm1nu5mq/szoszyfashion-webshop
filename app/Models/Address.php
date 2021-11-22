<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id', // user's ID
        'type',    // address's type
        'zip',     // ZIP code
        'city',    // city
        'street',  // street (without house no or other data)
        'house',   // house NO
        'floor',   // floor (if exists)
        'door'     // door NO (if exists)
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
}
