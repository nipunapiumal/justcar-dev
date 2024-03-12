<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    public function getCategory()
    {
        $data  = ThreadCategory::find($this->category_id);
        return $data->name;
    }
    public function getReplyCount()
    {
        return ThreadReply::where('thread_id', $this->id)->count();
    }
    public function getLastReplyTime()
    {
        $data  =  ThreadReply::where('thread_id', $this->id)->latest()->first();
        if(isset($data->created_at)){
            return $data->created_at;
        }else{
            return false;
        }
    }
    public function getCreatorName()
    {
        $data  = User::find($this->created_by);
        return $data->name;
    }
}
