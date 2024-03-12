<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDuration extends Model
{
    use HasFactory;

    public function plan()
    {
        return $this->hasOne('App\Models\Plan', 'id', 'plan_id');
    }
    public function getPlan()
    {
        $data  = Plan::find($this->plan_id);
        return $data->name;
    }
}
