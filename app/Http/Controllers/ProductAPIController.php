<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use DB;
use Illuminate\Support\Facades\Input;

class ProductAPIController extends Controller
{
    public function index(){
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
    public function textsearch(){
      $lastprice = Input:: Get('price');
      if ($lastprice){
        $q = Input:: Get('q');
        $Q = '%'.$q.'%';
        $results = Product::where('brand', 'LIKE', $Q)->where('price', '<', $lastprice)->get();
        $results = $results->merge(Product::where('model', 'LIKE', $Q)->where('price', '<', $lastprice)->get());
        $splice = $results->sortByDesc('price')->splice(0, 12);
        return $splice->toArray();
      }
      else{
        $q = Input:: Get('q');
        $Q = '%'.$q.'%';
        $results = Product::where('brand', 'LIKE', $Q)->get();
        $results = $results->merge(Product::where('model', 'LIKE', $Q)->get());
        $splice = $results->sortByDesc('price')->splice(0, 12);
        return $splice->toArray();
      }
    }
    public function filter(){
      $input = Input::all();
      $id = $input['id'];
      $maxprice = $input['maxprice'];
      $brands = explode(',', $input['brands']);
      if (Input::has('price')){
        $lastprice = $input['price'];
        $products = Product::where('category_id', $id)->where('price', '<', $lastprice)->orderBy('price', 'DESC')->get();
      }
      else{
        $products = Product::where('category_id', $id)->where('price', '<=', $maxprice)->orderBy('price', 'DESC')->get();
      }
      if ($brands[0] == '0'){
        $filtered = $products;
      }
      else{
        $filtered = collect();
        foreach($brands as $brand){
          $brandproducts = $products->where('brand', $brand);
          foreach($brandproducts as $brandproduct){
            $filtered->push($brandproduct);
          }
        }
      }
      $splice = $filtered->splice(0, 12);
      return $splice->toArray();
    }
    public function mainfilter(){
      $input = Input::all();
      $maxprice = $input['maxprice'];
      $brands = explode(',', $input['brands']);
      if (Input::has('price')){
        $lastprice = $input['price'];
        $products = Product::where('price', '<', $lastprice)->orderBy('price', 'DESC')->get();
      }
      else{
        $products = Product::where('price', '<=', $maxprice)->orderBy('price', 'DESC')->get();
      }
      if ($brands[0] == '0'){
        $filtered = $products;
      }
      else{
        $filtered = collect();
        foreach($brands as $brand){
          $brandproducts = $products->where('brand', $brand);
          foreach($brandproducts as $brandproduct){
            $filtered->push($brandproduct);
          }
        }
      }
      $splice = $filtered->splice(0, 12);
      return $splice->toArray();
    }
}
