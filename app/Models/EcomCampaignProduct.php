<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class EcomCampaignProduct extends Model
{
    use softdeletes;

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
     protected $fillable = [
         'campaign_id',
         'product_id'
     ];

     public function product(){
         return $this->hasOne(Product::class,'id','product_id');
     }
}
