<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class LeftAPIController extends Controller
{
    public function leftblock()
    {
        $categories = Category::with('children')->where('parent_id','0')->get();
        return $categories->toArray();
    }
}
