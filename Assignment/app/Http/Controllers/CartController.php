<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index(Cart $cart)
    {
        return view('frontend.cart.index', compact('cart'));
    }

    public function add(Request $request, Cart $cart)
    {
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $cart->addCart($product, $quantity);
        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
    }

    public function checkout(Request $request)
    {
        if ($request->hasFile('image')) {
            $url = Storage::put('image', $request->file('image'));
        } else {
            $url = '';
        }
        DB::table('orders')->insert([

            'shipping' => $request->shipping,
            'image' => $url,
            'city' => $request->city,
            'name' => $request->name,
            'product_name' => $request->product_name,
            'total' => $request->total,
            // 'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Session::flush();
        return redirect()->route('cart.notification');
    }

    public function notification(Request $request)
    {
        return view('frontend.cart.notification');
    }
}
