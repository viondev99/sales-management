<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table  = "brands";
    protected $primaryKey = "brand_id";
    protected $fillable = [
        'brand_id',
        'type_id',
        'brand_name',
        'brand_code',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
