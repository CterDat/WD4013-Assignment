<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $listTop3 = Banner::query()->take(3)->get();
    $listTop5 = Product::query()->take(4)->get();
    $userType = auth()->check() ? auth()->user()->type : null;
    return view('welcome',compact('listTop3', 'listTop5', 'userType'));
});

Route::resource('products', ProductController::class);
// Route::get('/pct', [ProductController::class, 'layout'])->name('pct.layout');
Route::resource('admin', AdminController::class);
Route::resource('category', CategoryController::class)->middleware('isAdmin');
Route::resource('banner', BannerController::class);

Route::post('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/notification', [CartController::class, 'notification'])->name('cart.notification');
// Route::post('/checkout', 'CartController@processCart')->name('checkout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
