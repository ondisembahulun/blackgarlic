<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'shipping_address',
        'shipping_city',
        'courier',
        'shipping_cost',
        'subtotal',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'payment_reference',
        'notes',
    ];

    protected $casts = [
        'shipping_cost' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAmountAttribute(): string
    {
        return 'Rp '.number_format((float) $this->total_amount, 0, ',', '.');
    }

    public function getFormattedSubtotalAttribute(): string
    {
        return 'Rp '.number_format((float) $this->subtotal, 0, ',', '.');
    }

    public function getFormattedShippingCostAttribute(): string
    {
        return 'Rp '.number_format((float) $this->shipping_cost, 0, ',', '.');
    }

    public function getStatusBadgeAttribute(): array
    {
        return match ($this->order_status) {
            'completed' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-800', 'label' => __('Selesai')],
            'shipped' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => __('Dalam Pengiriman')],
            'processing' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'label' => __('Sedang Diproses')],
            'cancelled' => ['bg' => 'bg-rose-100', 'text' => 'text-rose-800', 'label' => __('Dibatalkan')],
            default => ['bg' => 'bg-stone-100', 'text' => 'text-stone-800', 'label' => __('Menunggu Pembayaran')],
        };
    }
}
