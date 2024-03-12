<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'max_stores',
        'max_products',
        'enable_custdomain',
        'enable_custsubdomain',
        'additional_page',
        'blog',
        'shipping_method',
        'ad_free',
        'free_layouts',
        'premium_layouts',
        'secure_website_address',
        'mobile_optimized',
        'contact_form',
        'gallery',
        'support_by_mail',
        'support_by_phone',
        'support_by_whatsapp',
        'api_services',
        // 'premium_support',
        // 'premium_plus_support',
        'disable_product',
        'job_board',
        'image',
        'description',
    ];

    public static $arrDuration = [
        'Unlimited' => 'Unlimited',
        'Month' => 'Per Month',
        'HalfYear' => 'Per Half-Year',
        'Year' => 'Per Year',
    ];

    public function status()
    {
        return [
            __('Unlimited'),
            __('Per Month'),
            __('Per Half-Year'),
            __('Per Year'),
        ];
    }

    public static function total_plan()
    {
        return Plan::count();
    }

    public static function most_purchese_plan()
    {
        $free_plan = Plan::where('price', '<=', 0)->first()->id;

        return User:: select('plans.name', 'plans.id', \DB::raw('count(*) as total'))->join('plans', 'plans.id', '=', 'users.plan')->where('type', '=', 'owner')->where('plan', '!=', $free_plan)->orderBy('total', 'Desc')->groupBy('plans.name', 'plans.id')->first();
    }

    public function transkeyword()
    {
        $arr = [
            __('Per Month'),
            __('Per Year'),
            __('Year'),
        ];
    }

    public function getDurations()
    {
        return PlanDuration::where('plan_id', $this->id)->get();

    }
}

