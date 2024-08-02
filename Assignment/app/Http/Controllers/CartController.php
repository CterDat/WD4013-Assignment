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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Session::flush();
        return redirect()->route('cart.notification');
    }
    // public function checkout(Request $request)
    // {
    //     // Lấy thông tin thanh toán từ request
    //     $shippingAddress = $request->input('shipping_address');
    //     $paymentMethod = $request->input('payment_method');
    //     $total = $request->input('total');

    //     // Xử lý thanh toán
    //     if ($this->processPayment($shippingAddress, $paymentMethod, $total)) {
    //         // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    //         $this->storeOrder($shippingAddress, $paymentMethod, $total);

    //         // Xóa giỏ hàng sau khi thanh toán thành công
    //         Session::flush();

    //         // Chuyển hướng đến trang xác nhận đơn hàng
    //         return redirect()->route('cart.notification');
    //     } else {
    //         // Xử lý lỗi thanh toán
    //         return redirect()->back()->withErrors(['message' => 'Payment failed']);
    //     }
    // }

    // private function processPayment($shippingAddress, $paymentMethod, $total)
    // {
    //     // Thực hiện logic xử lý thanh toán ở đây
    //     // Ví dụ: gọi đến một cổng thanh toán bên thứ ba
    //     // và trả về kết quả của quá trình thanh toán
    //     return true;
    // }

    // private function storeOrder($shippingAddress, $paymentMethod, $total)
    // {
    //     // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    //     DB::table('orders')->insert([
    //         'shipping_address' => $shippingAddress,
    //         'payment_method' => $paymentMethod,
    //         'total' => $total,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);
    // }
    public function notification(Request $request)
    {
        return view('frontend.cart.notification');
    }
}
