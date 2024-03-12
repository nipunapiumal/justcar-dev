<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadReply extends Model
{
    use HasFactory;
    public function getCreatorName()
    {
        $data  = User::find($this->created_by);
        return $data->name;
    }
}
