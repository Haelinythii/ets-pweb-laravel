<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_task extends Model
{
    use HasFactory;
    protected $fillable = ['task_id', 'tag_id'];
}
