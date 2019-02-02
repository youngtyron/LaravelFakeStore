<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int $assortment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $parent_id
 * @property int $is_last
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $children
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereAssortment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereIsLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
  protected $fillable = ['name', 'image', 'parent_id'];

  public function children(){
    return $this->hasMany(self::class, 'parent_id');
  }
  public function products(){
    return $this->hasMany('App\Product');
  }
  public static function get_all_categories(){
    $categories = Category::all();
    foreach ($categories as $category) {
      if ($category->is_last==0){
        $children = $category->children;
        foreach ($children as $child) {
          if ($child->is_last==0){
            $obj = Category::where('parent_id', $child->id)->get();
            $child->children=$obj;
          }
        }
      }
    }
   return $categories;
  }
}
