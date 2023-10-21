<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
    'id',
    'name',
    'email',
    'phone',
    'pincode',
    'address',
    'product_title',
    'quantity',
    'price',
    'status',
    'paymentmode',
    'created_at',
        ];
}
