<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
      return view('catalog.categories.index', [
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
      ]);
      // $categories = Category::paginate();
      // return $categories->toArray();
      // echo 'index method';
    }

    public function show(Category $category)
    {
      return view('catalog.categories.show');
    }

    public function destroy(Category $category)
    {
        //
    }
}
