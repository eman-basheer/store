<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * @param \Illuminate\http\Response
     */
    public function create()
    {
        $categories = auth()->user()->categories()->get();
        return view('admin.products.create', compact('categories'));
    }

    /**

     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->destreption = $request->destreption;
        $product->save();
        $product->user_id = Auth::id();

        return redirect()->back();
    }

    /**
     * @param \app\Models\Admin\Product $product
     * @param \Illuminate\http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        $category_name = Category::find($product->category_id);
        return view('admin.product.edit', compact('product', 'categories', 'category_name'));
    }



    /**
     * @param \Illuminate\http\Request $request
     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->destreption = $request->destreption;
        $product->save();

        return redirect('product');
    }
    /**
     * @param \app\Models\Admin\Products $product
     * @param \Illuminate\http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
