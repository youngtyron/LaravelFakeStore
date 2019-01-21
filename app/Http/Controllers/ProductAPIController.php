<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use DB;
use Illuminate\Support\Facades\Input;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lastprice = Input:: Get('price');
      if ($lastprice){
        $id = Input:: Get('id');
        $products = DB::table('products')->where('category_id', $id)->where('price', '<', $lastprice)->orderBy('price', 'DESC')->get();
        $splice = $products->splice(0, 12);
        return $splice->toArray();
      }
      else{
        $id = Input:: Get('id');
        $products = DB::table('products')->where('category_id', $id)->orderBy('price', 'DESC')->get();
        $splice = $products->splice(0, 12);
        return $splice->toArray();
      }
    }

}
