<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
        'price',
        'in_stock',
        'is_active',
        'is_feature',
        'on_sale',
        'category_id',
        'brand_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

     /**
     * @return array<string, string>
     */
    protected function casts(): array
    { 
        return [
            'images' => 'array',
        ];
    }
}
