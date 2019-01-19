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
      $id = Input:: Get('id');
      $products = Product::where('category_id', $id)->paginate();
      return $products->toArray();
    }

}
