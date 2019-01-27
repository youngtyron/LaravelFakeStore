<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Product;
use App\Category;
use \Cache;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $user_id = auth()->user()->id;
        $basket = Basket::firstOrCreate(['user_id'=>$user_id]);
        $product_id = $request['id'];
        $product = Product::find($product_id);
        $basket->products()->save($product);
        $num = count($basket->products);
        $writeTovar = $basket->writeTovar();
        $array = array ('num'=>$num,'writeTovar'=>$writeTovar);
        return $array;
    }
    public function show(){
      $user_id = auth()->user()->id;
      $basket = Basket::firstOrCreate(['user_id'=>$user_id]);
      return view('basket.show', [
        'basket'=>$basket,
        'num_in_basket'=> $basket->num_in_basket(),
        'writeTovar' => $basket->writeTovar(),
        'categories' =>Cache::rememberForever('allcategories', function() {
             return Category::get_all_categories();
            }),
      ]);
    }
}
