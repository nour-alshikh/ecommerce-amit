<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_image', 'product_discount', 'product_tax', 'product_total', 'name', 'phone', 'status', 'order_date'];
}
