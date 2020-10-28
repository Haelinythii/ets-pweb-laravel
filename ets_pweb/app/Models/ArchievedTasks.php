<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchievedTasks extends Model
{
    use HasFactory;
    protected $fillable = ['TaskName', 'idUser', 'deadline'];

}
