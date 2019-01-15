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
  
}
