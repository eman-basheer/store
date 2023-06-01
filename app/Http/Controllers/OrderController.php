<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = auth()->user()->orders()->paginate();
        return view("admin.orders.index", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = auth()->user()->products()->get();
        return view("admin.orders.create", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;

        $order->name = $request->name;
        $order->user_id = Auth::id();
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;

        $order->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $products = Product::where("user_id", Auth::id())->get();

        return view("admin.orders.edit", compact("order", "products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);


        $order->name = $request->name;
        $order->user_id = Auth::id();
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;

        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

    public function buy($productId)
    {
        $product = Product::find($productId);
        $user = auth()->user();

        $order = new Order;

        $order->name = $user->name . ' buys ' . $product->name;
        $order->user_id = $user->id;
        $order->product_id = $productId;
        $order->quantity = request("quantity", 1);
        $order->total_price = request("quantity", 1) * $product->price;

        $order->save();

        return redirect()->back();
    }
}
