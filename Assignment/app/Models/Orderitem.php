<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'quantity',
        'created_at',
        'updated_at'
    ];
}
