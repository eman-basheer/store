<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=category::all();
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**

     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */

    public function store(Request $request)
    {
        $categories = new category;
        $categories->name = $request->name;

        $categories->save();

        return redirect()->back();
    }

    /**
     * @param \app\Models\Admin\categories $catagory
     * @param \Illuminate\http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
      /**  $categories = Category::all();
       * $category_name = Category::where('id', $Category->category_id)->first();
      *  return view('admin.product.edit', compact('product', 'categories', 'category_name')); */
      return view('admin.categories.edit',compact('category'));
    }



    /**
     * @param \Illuminate\http\Request $request
     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */
    public function update(Request $request, $id)
    {
        $catagory = Category::find($id);

        $catagory->name = $request->name;

        $catagory->save();

        return redirect('categories');
    }
    /**
     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}

