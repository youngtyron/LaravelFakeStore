<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use DB;
use Illuminate\Support\Facades\Input;

class CategoryAPIController extends Controller
{

    public function index()
    {
      $lastprice = Input::Get('price');
      if ($lastprice){
        $products = Product::where('price', '<', $lastprice)->orderBy('price', 'DESC')->get();
        $splice = $products->splice(0, 12);
        return $splice->toArray();
      }
      else{
        $products = Product::orderBy('price', 'DESC')->get();
        $splice = $products->splice(0, 12);
        return $splice->toArray();
      }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
