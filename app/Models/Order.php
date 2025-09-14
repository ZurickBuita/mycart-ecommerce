<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'status',
        'currency',
        'country',
        'total_price',
        'street_address',
        'city',
        'state_province',
        'zip_postalcode',
        'notes'
    ];
}
