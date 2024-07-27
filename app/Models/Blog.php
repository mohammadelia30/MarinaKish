<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'summary',
        'content',
        'duration_of_study'
    ];
    protected $casts = [
        'title' => 'string',
        'content' => 'text'
    ];
}
