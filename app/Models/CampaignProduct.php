<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class CampaignProduct extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    use softDeletes;

    protected $guarded = ['id'];

    public function campaignProductFromShop(){
        return $this->hasOne('App\VendorProduct','user_id','vendor_id');
    }
}
