<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['model', 'brand', 'assortment', 'category_id', 'price', 'characteristic', 'summary', 'color'];

  public $timestamps = false;

  public function category()
  {
    return $this->belongsTo('App\Category', 'category_id');
  }
}
