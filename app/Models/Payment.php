<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'reference',
        'amount',
        'provider',
        'method', 
        'currency'
    ];
}
