<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Basket;
use App\ProductImage;
use Illuminate\Http\Request;
use \Cache;
use DB;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    public function textsearch(Request $request){
        return view('search.products', [
          'q'=>$request['q'],
          'categories' =>Cache::rememberForever('allcategories', function() {
               return Category::get_all_categories();
              }),
        ]);
    }
    public function index_category(Request $request, $id){

      if ($request->user()->is_admin){
        return view('catalog.products', [
          'max'=>$max = Product::where('category_id', $id)->max('price'),
          'min'=>$max = Product::where('category_id', $id)->min('price'),
          'idkey'=>$id,
          'categories' =>Cache::rememberForever('allcategories', function() {
               return Category::get_all_categories();
              }),
          'brands' => array_unique(Product::where('category_id', $id)->pluck('brand')->toArray()),

        ]);
      }
      else{
        $basket = $request->user()->basket;
        return view('catalog.products', [
          'idkey'=>$id,
          'categories' =>Cache::rememberForever('allcategories', function() {
               return Category::get_all_categories();
              }),
          'num_in_basket'=> $basket->num_in_basket(),
          'writeTovar' => $basket->writeTovar(),
          'brands' => array_unique(Product::where('category_id', $id)->pluck('brand')->toArray()),
        ]);
      }
    }

    public function show(Request $request, Product $product)
    {
        if ($request->user()->is_admin){
          return view('catalog.products.show', [
            'product'=>Product::find($product->id),
            'categories' =>Cache::rememberForever('allcategories', function() {
                 return Category::get_all_categories();
                }),
          ]);
        }
        else {
          $basket = $request->user()->basket;
          return view('catalog.products.show', [
            'product'=>Product::find($product->id),
            'categories' =>Cache::rememberForever('allcategories', function() {
                 return Category::get_all_categories();
                }),
            'num_in_basket'=> $basket->num_in_basket(),
            'writeTovar'=> $basket->writeTovar(),
          ]);
          }
    }
    public function destroy(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        return view('catalog.products.edit', [
          'product'=>Product::find($product->id),
          'categories'=>Category::where('is_last', '1')->get()
        ]);
    }
    public function update(Request $request, Product $product)
    {
      $general= $request->file('general-image');
      $path = $general->store('uploads', 'public');
      $product->brand = $request['brand'];
      $product->model = $request['model'];
      $product->assortment = $request['assortment'];
      $product->price = $request['price'];
      $product->color = $request['color'];
      $product->characteristic = $request['characteristic'];
      $product->summary = $request['summary'];
      $product->category_id = $request['category_id'];
      ProductImage::create([
                 'image' => $path,
                 'product_id' => $product->id]);
      $product->image = 'storage/'.$path;
      $images = $request->file('other-images');
      if (!empty($images)){
        foreach ($images as $image){
          $path = $image->store('uploads', 'public');
          ProductImage::create([
                     'image' => $path,
                     'product_id' => $product->id]);
        }
      }
      $product->save();
      return redirect()->route('admin.categories');
    }
}
