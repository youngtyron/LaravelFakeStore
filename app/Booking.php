<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function products()
  {
    return $this->belongsToMany('App\Product', 'booking_product', 'booking_id', 'product_id');
  }
}
