<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function gallery_category()
    {
        $result = GalleryCategorie::whereIn('id', explode(',', $this->gallery_categorie))->get()->pluck('name')->toArray();

        return implode(', ', $result);
    }
}
