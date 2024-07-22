<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'code',
        'percent',
        'number',
        'expire_time',
    ];
    protected $casts =[
        'title' => 'string',
        'code' => 'string',
        'percent' => 'integer',
        'number' => 'integer',
        'expire_time' => 'datetime',
    ];
}