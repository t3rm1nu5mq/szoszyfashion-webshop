<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',              // order's ID
        'customer_id',           // customer's ID
        'delivery_mode',         // order's delivery mode
        'delivery_address_id',   // delivery address's ID
        'payment_id'             // payment ID (if order payed successfully)
    ];

    public function deliveryAddress() {
        return $this->hasOne(Address::class, 'id', 'delivery_address_id');
    }

    public function paymentData() {
        // todo: get payment data
    }
}
