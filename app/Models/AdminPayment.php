<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPayment extends Model
{
    protected $fillable = ['name', 'phone', 'total_received'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
