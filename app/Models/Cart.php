<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'image', 'product_name', 'quantity', 'price', 'product_id', 'user_id'];
}
