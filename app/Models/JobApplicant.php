<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;
    // public function job_board()
    // {
    //     $result = JobBoard::whereIn('id', explode(',', $this->job_board))->get()->pluck('title')->toArray();
    //     return implode(', ', $result);
    // }
}
