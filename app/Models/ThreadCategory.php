<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadCategory extends Model
{
    use HasFactory;

    public function getThreadCount()
    {
        return Thread::where('category_id', $this->id)->count();
    }
}
