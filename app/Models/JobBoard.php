<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBoard extends Model
{
    use HasFactory;
    public function job_category()
    {
        $result = JobCategories::whereIn('id', explode(',', $this->job_category))->get()->pluck('name')->toArray();
        return implode(', ', $result);
    }
}
