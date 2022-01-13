<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Wishlist extends Model
{
    use softDeletes;

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    protected $fillable = [
        'product_id',
        'user_id'
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
