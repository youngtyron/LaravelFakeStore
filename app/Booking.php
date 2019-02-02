<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Booking
 *
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $sum
 * @property int $in_stock
 * @property int $is_bought
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereIsBought($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereUserId($value)
 */

class Booking extends Model
{
  protected $fillable = ['user_id', 'sum', 'created_at', 'in_stock'];
  public $timestamps = true;

  public function products()
  {
    return $this->belongsToMany('App\Product', 'booking_product', 'booking_id', 'product_id');
  }
}
