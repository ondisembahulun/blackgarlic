<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'subtitle',
        'description',
        'price',
        'net_weight',
        'ingredients',
        'benefits',
        'usage_instructions',
        'image_url',
        'is_featured',
        'stock_status',
    ];

    protected $casts = [
        'benefits' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp '.number_format((float) $this->price, 0, ',', '.');
    }
}
