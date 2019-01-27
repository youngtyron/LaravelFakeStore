<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
      $basket = $request->user()->basket;
      return view('catalog.categories.index', [
        'num_in_basket'=> $basket->num_in_basket(),
        'writeTovar' => $basket->writeTovar(),
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
      ]);
    }

    public function show(Category $category)
    {
        return view('catalog.categories.index',[
          'categories'=>Category::where('parent_id', $category->id)->get(),
        ]);
      }

    public function destroy(Category $category)
    {
        //
    }

}
