<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'label',
        'street',
        'number',
        'postal_code',
        'city',
        'country',
        'complement'
    ];
}
