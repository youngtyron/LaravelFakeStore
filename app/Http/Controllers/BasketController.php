<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Product;
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
        echo 'hello';
    }
}
