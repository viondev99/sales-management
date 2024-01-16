<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $primaryKey = "cart_id";
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price_item',
        'price_quantity',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
