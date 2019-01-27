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
  public function num_in_basket(){
    return count($this->products()->get());
  }
  public function writeTovar(){
    if ($this->num_in_basket() % 10 == 1){
      return 1;
    }
    else if ($this->num_in_basket() % 10 == 2 or $this->num_in_basket() % 10 == 3  or $this->num_in_basket() % 10 == 4){
      return 2;
    }
    else {
      return 0;
    }
  }
  public function sum(){
    $sum = 0;
    foreach ($this->products()->get() as $product){
      $sum = $sum + $product->price;
    };
    return $sum;
  }
}
