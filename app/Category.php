<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
