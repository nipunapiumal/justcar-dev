<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoGallery extends Model
{
    use HasFactory;
    public function getStoredDir($type)
    {

        if ($type == "header_img") {
            $inner_path = "store_logo";
        } else if ($type == "testimonial_img") {
            $inner_path = "store_logo";
        } else {
            $inner_path = "auto_gallery_images";
        }
        return $inner_path;
    }
}
