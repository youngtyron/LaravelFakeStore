<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['model', 'brand', 'assortment', 'category_id', 'price', 'characteristic', 'summary', 'color', 'image'];

  public $timestamps = false;

  public function category()
  {
    return $this->belongsTo('App\Category', 'category_id');
  }
  public function images(){
    return $this->hasMany('App\ProductImage');
  }
  public function bookings()
  {
    return $this->belongsToMany('App\Booking');
  }
  public function baskets()
  {
    return $this->belongsToMany('App\Basket');
  }
}
