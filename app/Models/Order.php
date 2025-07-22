<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'phone',
        'address',
        'product_id',
        'admin_payment_id',
        'quantity',
        'payment_amount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function adminPayment()
    {
        return $this->belongsTo(AdminPayment::class);
    }
}
