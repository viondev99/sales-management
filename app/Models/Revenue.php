<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = "revenues";
    protected $primaryKey = "revenue_id";
    protected $fillable = [
        'revenue_id',
        'order_id',
        'revenue_amount',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
