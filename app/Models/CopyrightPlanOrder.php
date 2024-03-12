<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyrightPlanOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'copyright_plan_name',
        'copyright_plan_id',
        'price',
        'price_currency',
        'txn_id',
        'payment_type',
        'payment_status',
        'receipt',
        'user_id',
    ];
}
