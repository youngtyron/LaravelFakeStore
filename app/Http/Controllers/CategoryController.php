<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('catalog.categories.index', [
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
      ]);
      // $categories = Category::paginate();
      // return $categories->toArray();
      // echo 'index method';
    }
    public function adminshow()
    {
      return view('admin.categories.categories', [
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
        'delimiter'=>''
      ]);
      // $categories = Category::paginate();
      // return $categories->toArray();
      // echo 'index method';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.create',[
        'category'=>[],
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
        'delimiter'=>''
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request;
        Category::create($request->all());
        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      return view('catalog.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      return view('admin.categories.edit',[
        'category'=>$category,
        'categories'=>Category::with('children')->where('parent_id','0')->get(),
        'delimiter'=>''
      ]);
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
      $category->name = $request['name'];
      $category->image = $request['image'];
      $category->parent_id = $request['parent_id'];
      $category->save();
      return redirect()->route('admin.categories');
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
