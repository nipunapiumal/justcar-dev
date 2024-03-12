<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StoragePlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'capacity',
        'description',
    ];

    public static function priceWithTax($price)
    {

        $vat = 19;
        if ($price) {
            $total = $price;
            // $total = ($price * env('STORAGE_PLAN_DURATION')) - StorageOrder::getCredit();
            $totalWithTax = $total + ($total * $vat * 0.01);
        } else {
            //for free plans
            $totalWithTax = 0;
        }

        $data["pretty_with_tax"] = number_format($totalWithTax, 2) . "" . env('CURRENCY_SYMBOL');
        $data["with_tax"] = $totalWithTax;

        return $data;
    }
}
