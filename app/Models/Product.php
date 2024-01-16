<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $fillable = [
        'product_id',
        'brand_id',
        'type_id',
        'product_name',
        'price',
        'discounted_price',
        'product_image',
        'description',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
