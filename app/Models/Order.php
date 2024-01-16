<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "order_id";
    protected $fillable = [
        'order_id',
        'user_id',
        'cart_id',
        'total_amount',
        'discount',
        'bonus_item',
        'order_price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function revenue()
    {
        return $this->hasOne(Revenue::class);
    }
}
