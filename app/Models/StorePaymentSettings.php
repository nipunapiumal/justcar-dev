<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePaymentSettings extends Model
{
    protected $fillable = [
        'name',
        'value',
        'store_id',
        'created_by',
    ];
    use HasFactory;
}
