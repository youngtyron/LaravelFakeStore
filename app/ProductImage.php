<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  protected $fillable = ['image', 'product_id'];

  public $timestamps = false;

  public function product()
  {
    return $this->belongsTo('App\Product', 'product_id');
  }
}
