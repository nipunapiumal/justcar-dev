<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;


    public static function getAdvertisement($store, $device)
    {

        $creator = \App\Models\User::find($store->created_by);
        $plan = \App\Models\Plan::find($creator->plan);
        $output = null;

        if ($plan->ad_free == 'off') :

            $advertisement = Advertisement::count();

            if ($advertisement > 0) {
                // $advertisements = Advertisement::all()->random(1)->where('device', '=', $device);
                $advertisements = Advertisement::inRandomOrder()->where('device', '=', $device)->limit(1)->get();

                foreach ($advertisements as $advertisement) :
                    $output .= '<div class="row">';
                    $output .= '<div class="col-lg-12 text-center">';
                    if ($advertisement->advertisement_type == 1) :
                        $output .= "<a href=" . $advertisement->url . ">";
                        if (!empty($advertisement->info) && \Storage::exists('uploads/advertisement/' . $advertisement->info)) :
                            $output .= "<img alt='Image placeholder' class='img-fluid' src='" . asset(\Storage::url('uploads/advertisement/' . $advertisement->info)) . "'>";
                        endif;
                        $output .= " </a>";
                    else :
                        $output .= $advertisement->info;
                    endif;
                    $output .= ' </div>';
                    $output .= '</div>';
                endforeach;
            }



        endif;









        return $output;
    }
}
