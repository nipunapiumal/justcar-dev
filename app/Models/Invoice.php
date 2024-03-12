<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // public function customer()
    // {
    //     return $this->hasOne(Customer::class);
    // }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    public function vehicle()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
