<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function index_category($id)
    {
      return view('catalog.products', [
        'products'=>DB::table('products')->where('category_id', $id)->get(),
      ]);
    }

    public function show(Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
