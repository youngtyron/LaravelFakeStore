<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use \Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
          'categories' =>Cache::rememberForever('allcategories', function() {
               return Category::get_all_categories();
              }),
        ]);
    }
}
