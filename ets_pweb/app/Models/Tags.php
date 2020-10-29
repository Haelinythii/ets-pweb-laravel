<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = ['TagName', 'idUser'];

    public function manyTask()
    {
        return $this->belongsToMany(Tasks::class);
    }
}
