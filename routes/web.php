<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**
*Route::get('/', function () {
   * return view('welcome');
*});


*route::get('admin/products/create',function(){
   * return view('admin.products.create');
*});

*route::get('admin/products',function(){
   * return view('admin.products.index');
*});*/

//dashboard route
route::get('products', [ProductController::class, 'index']);
route::get('products/create', [ProductController::class, 'create']);
route::get('products/store', [ProductController::class, 'store']);
route::get('products/edit/(id)', [ProductController::class, 'edit']);
route::get('products/delete/(id)', [ProductController::class, 'delete']);
route::get('products/update/(id)', [ProductController::class, 'update']);

route::get('categories', [CategoryController::class, 'index']);
route::get('categories/create', [CategoryController::class, 'create']);
route::get('categories/store', [CategoryController::class, 'store']);
route::get('categories/edit/(id)', [CategoryController::class, 'edit']);
route::get('categories/delete/(id)', [CategoryController::class, 'delete']);
route::get('categories/update/(id)', [CategoryController::class, 'update']);






Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/create', [OrderController::class, 'create']);
Route::get('/orders/edit/{id}', [OrderController::class, 'edit']);
Route::post('/orders/store', [OrderController::class, 'store']);
Route::post('/orders/update/{id}', [OrderController::class, 'update']);
Route::get('/orders/destroy/{id}', [OrderController::class, 'destroy']);
Route::post('/orders/{productId}/buy', [OrderController::class, 'buy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
