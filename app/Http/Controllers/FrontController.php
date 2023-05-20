<?php

namespace App\Http\Controllers;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $products = Product::all();
    return view('home.index' , compact('products'));
}
}
