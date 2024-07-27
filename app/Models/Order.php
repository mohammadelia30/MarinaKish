<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'status',
        'beath',
        'passenger_id',
        'factor_id'
    ];
    protected $casts =[
        'user_id'=> 'integer',
        'status'=>'enum',
        'beath'=>'datetime',
        'factor_id'=>'integer',
        'passenger_id'=>'integer'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function factor():HasOne
    {
        return $this->hasOne(Factor::class);
    }
    public function passengers():HasMany
    {
        return $this->hasMany(Passenger::class);
    }

}

