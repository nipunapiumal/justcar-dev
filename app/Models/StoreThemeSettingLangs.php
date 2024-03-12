<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreThemeSettingLangs extends Model
{
    protected $fillable = [
        'parent_id',
        'lang',
        'value',
    ];
    use HasFactory;
}
