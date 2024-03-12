<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLangs extends Model
{
    protected $fillable = [
        'parent_id',
        'lang',
        'name',
        'description',
    ];
    use HasFactory;
}
