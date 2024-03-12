<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StorageOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'storage_name',
        'storage_id',
        'size',
        'price',
        'price_currency',
        'txn_id',
        'payment_type',
        'payment_status',
        'receipt',
        'user_id',
    ];

    public static function getCredit()
    {
        $objUser = \Auth::user();
        $value = 0;
        $storage_plan = StoragePlan::find($objUser->storage_plan);
        $storage_orders = DB::table('storage_orders')
            ->latest('created_at')
            ->first();
        $diff_months = 0;

        $storage_plan_expire_date  = Carbon::parse($objUser->storage_plan_expire_date);
        $now = strtotime(Carbon::now());
        $storage_plan_expire_date = strtotime($storage_plan_expire_date);


        if ($now >= $storage_plan_expire_date) {
            //plan already passes
        } else {
            if ($storage_orders) {
                $diff_months = Carbon::parse($storage_orders->created_at)->diff(Carbon::now())->format('%m');
                $diff_days = Carbon::parse($storage_orders->created_at)->diff(Carbon::now())->format('%d');

                if ($diff_days > 0) {
                    $diff_months += 1;
                }

                $value = $storage_plan->price * $diff_months;
            }
        }


        return $value;
    }
}
