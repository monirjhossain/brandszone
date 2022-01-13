<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Logistic extends Model
{

  use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

  protected $guarded = ['id'];

  public function scopeActive($query){
      return  $query->where('is_active', 1)->get();
  }

}
