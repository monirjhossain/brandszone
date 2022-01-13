<?php

namespace App\Models;

use App\EcomProductVariantStock;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class EcomCart extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds


    public function relation_product_stock(){
        return $this->hasOne(EcomProductVariantStock::class,'id','product_stock_id');
    }
}
