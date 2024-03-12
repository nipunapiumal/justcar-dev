<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_categorie',
        'price',
        'quantity',
        'SKU',
        'product_tax',
        'product_display',
        'rating_display',
        'is_cover',
        'description',
        'detail',
        'specification',
        'created_by',
    ];

    public function categories()
    {
        return $this->hasOne('App\Models\ProductCategorie', 'id', 'product_categorie');
    }

    public function product_taxs()
    {
        return $this->hasOne('App\Models\ProductTax', 'id', 'product_tax');
    }

    public function product_category()
    {
        $result = ProductCategorie::whereIn('id', explode(',', $this->product_categorie))->get()->pluck('name')->toArray();

        return implode(', ', $result);
    }
    public function category_ids()
    {
        $result = ProductCategorie::whereIn('id', explode(',', $this->product_categorie))->get()->pluck('id')->toArray();

        return implode(', ', $result);
    }

    public function product_rating()
    {
        $ratting    = Ratting::where('product_id', $this->id)->where('rating_view', 'on')->sum('ratting');
        $user_count = Ratting::where('product_id', $this->id)->where('rating_view', 'on')->count();
        if($user_count > 0)
        {
            $avg_rating = number_format($ratting / $user_count, 1);
        }
        else
        {
            $avg_rating = number_format($ratting / 1, 1);

        }

        return $avg_rating;
    }

    public static function getCategoryById($productId)
    {
        $product = Product::find($productId);

        $result = ProductCategorie::whereIn('id', explode(',', $product->product_categorie))->get()->pluck('name')->toArray();

        return implode(', ', $result);
    }

    public static function getRatingById($productId)
    {
        $ratting    = Ratting::where('product_id', $productId)->where('rating_view', 'on')->sum('ratting');
        $user_count = Ratting::where('product_id', $productId)->where('rating_view', 'on')->count();
        if($user_count > 0)
        {
            $avg_rating = number_format($ratting / $user_count, 1);
        }
        else
        {
            $avg_rating = number_format($ratting / 1, 1);

        }

        return $avg_rating;
    }
    public static function getFuelTypeById($fuel_type_id)
    {
        $fuel_type    = FuelType::find($fuel_type_id);
        
        if(isset($fuel_type)){
            $fuel_type = $fuel_type->name;
        }else{
            $fuel_type = "-";
        }

        return $fuel_type;
    }
    public function getVehicleType()
    {
        $data  = VehicleType::find($this->vehicle_type_id);
        return $data->name;
    }
    public function getVehicleBrand()
    {
        $data  = VehicleBrand::find($this->brand_id);
        return $data->name;
    }
    public function getVehicleFuel()
    {
        $data  = FuelType::find($this->fuel_type_id);
        return $data->name;
    }
    public function getVehicleModel()
    {
        $data  = VehicleModel::find($this->model_id);
        return $data->name;
    }

    public static function possibleVariants($groups, $prefix = '')
    {
        $result = [];
        $group  = array_shift($groups);
        foreach($group as $selected)
        {
            if($groups)
            {
                $result = array_merge($result, self::possibleVariants($groups, $prefix . $selected . ' : '));
            }
            else
            {
                $result[] = $prefix . $selected;
            }
        }

        return $result;
    }

    public function product_img()
    {
        return $this->hasOne('App\Models\product_images', 'product_id', 'id');
    }
    public function getName()
    {
       
        $product = ProductLangs::where('parent_id', $this->id)->where('lang', App::currentLocale())->first();
        if(!isset($product->name)){
            $product = ProductLangs::where('parent_id', $this->id)->where('lang', 'en')->first();
            if(isset($product->name)){
                return $product->name;
            }else{
                $product = Product::find($this->id);
            return $product->name;
            }
        } else{
            return $product->name;
        }
    }
   
    public function getDescription()
    {
        $product = ProductLangs::where('parent_id', $this->id)->where('lang', App::currentLocale())->first();

        if(!isset($product->description)){
            $product = ProductLangs::where('parent_id', $this->id)->where('lang', 'en')->first();
            if(isset($product->description)){
                return $product->description;
            }
        } else{
            return $product->description;
        }
    }
    public function getNetPrice()
    {

        if($this->net_price){
            return "/ ".\App\Models\Utility::priceFormat($this->net_price);
        }
        return false;
        
    }
}
