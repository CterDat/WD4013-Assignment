<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping',
        'city',
        'name',
        'product_name',
        'created_at',
        'updated_at',
        'total',
    ];
}
