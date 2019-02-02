<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Product
 *
 * @mixin Eloquent
 * @property int $id
 * @property string $model
 * @property string $brand
 * @property int $assortment
 * @property string|null $characteristic
 * @property string|null $summary
 * @property int $category_id
 * @property string $color
 * @property string|null $image
 * @property int $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Basket[] $baskets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Booking[] $bookings
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductImage[] $images
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAssortment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCharacteristic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSummary($value)
 */

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
    // return $this->belongsToMany(Basket::class, 'basket_product');
  }
}
