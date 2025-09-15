<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_method',
        'notes',
        'user_id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
