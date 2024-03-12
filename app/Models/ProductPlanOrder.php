<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlanOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'product_plan_name',
        'product_plan_id',
        'price',
        'price_currency',
        'txn_id',
        'payment_type',
        'payment_status',
        'receipt',
        'user_id',
    ];
}
