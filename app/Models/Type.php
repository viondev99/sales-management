<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table  = "types";
    protected $primaryKey = "type_id";
    protected $fillable = [
        'type_id',
        'type_name',
        'type_code',
    ];
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
