<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Coupon extends Model
{

  use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    

    protected $guarded = ['id'];
    
    public function scopePublished($query){
        return  $query->where('is_published', 1);
    }

    public function findMyCode($code)
    {
      return self::where('code',$code)->first();
    }

    public function discount($total)
    {
      return $this->rate;
    }




    //END
}
