<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class LeftAPIController extends Controller
{
    public function leftblock()
    {
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
        return $categories->toArray();
    }
}
