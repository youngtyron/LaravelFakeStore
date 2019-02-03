<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DB;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
      if ($request->user()->is_admin){
        return view('catalog.categories.index', [
          'max'=>(Product::max('price'))+5000,
          'min'=>Product::min('price'),
          'categories'=>Category::with('children')->where('parent_id','0')->get(),
          'brands' => array_unique(DB::table('products')->pluck('brand')->toArray()),

        ]);
      }
      else{
        $basket = $request->user()->basket;
        return view('catalog.categories.index', [
          'max'=>(Product::max('price'))+5000,
          'min'=>Product::min('price'),
          'num_in_basket'=> $basket->num_in_basket(),
          'writeTovar' => $basket->writeTovar(),
          'categories'=>Category::with('children')->where('parent_id','0')->get(),
          'brands' => array_unique(DB::table('products')->pluck('brand')->toArray()),
        ]);
      }

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
