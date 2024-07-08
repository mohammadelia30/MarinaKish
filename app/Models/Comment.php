<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'body',
        'star',
        'status'
    ];
    protected $cast =[
        'user_id'=>'integer',
        'product_id'=>'integer',
        'title'=>'string',
        'body'=>'text',
        'star'=>'enum',
        'status'=>'enum'
    ];
}
