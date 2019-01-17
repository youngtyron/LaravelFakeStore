<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImage;
use DB;
// use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
  public function show()
  {
    return view('admin.panel');
  }
  public function categories()
  {
    return view('admin.categories.categories', [
      'categories'=>Category::with('children')->where('parent_id','0')->get(),
      'delimiter'=>''
    ]);
  }
  public function create_category()
  {
    return view('admin.categories.create',[
      'category'=>[],
      'categories'=>Category::with('children')->where('parent_id','0')->get(),
      'delimiter'=>''
    ]);
  }
  public function edit_category(Category $category)
  {
    return view('admin.categories.edit',[
      'category'=>$category,
      'categories'=>Category::with('children')->where('parent_id','0')->get(),
      'delimiter'=>''
    ]);
  }
  public function store_category(Request $request)
  {
      $category=Category::create($request->all());
      if($category->parent_id>0){
        $parent = Category::find($category->parent_id);
        $parent->is_last = false;
        $parent->save();
      }
      return redirect()->route('admin.categories');
  }
  public function update_category(Request $request, Category $category)
  {
    $category->name = $request['name'];
    $category->image = $request['image'];
    $category->parent_id = $request['parent_id'];
    $category->save();
    return redirect()->route('admin.categories');
  }
  public function create_product()
  {
      return view('admin.products.create',[
        'product'=>[],
        'categories'=>Category::where('is_last', '1')->get(),
      ]);
  }
  public function store_product(Request $request)
  {
    $product=Product::create($request->all());
    $general= $request->file('general-image');
    $path = $general->store('uploads', 'public');
    ProductImage::create([
               'image' => $path,
               'product_id' => $product->id]);
    $product->image = $path;
    $product->save();
    $images = $request->file('other-images');
    if (!empty($images)){
      foreach ($images as $image){
        $path = $image->store('uploads', 'public');
        ProductImage::create([
                   'image' => $path,
                   'product_id' => $product->id]);
      }
    }
    return redirect()->route('admin.categories');
  }

}
