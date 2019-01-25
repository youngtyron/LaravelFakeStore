<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
  protected $fillable = ['user_id'];
  public $timestamps = false;


  public function user()
  {
      return $this->hasOne('App\User');
  }
  public function products()
  {
    return $this->belongsToMany('App\Product', 'basket_product', 'basket_id', 'product_id');
  }
}
