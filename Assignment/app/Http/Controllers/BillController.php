<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::query()->get();
        return view('admin.bill.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order $item, string $id)
    {
        if (!$item) {
            return redirect()->route('bill.index')->with('error', 'Đơn hàng không tồn tại.');
        }
        Order::query()->where('id', $id)->update(['status' => 'shipped']);
        // Cập nhật trạng thái đơn hàng sang "Shipped"
    
        // Gửi thông báo thành công
        return redirect()->route('bill.index')->with('success', 'Đơn hàng đã được cập nhật trạng thái thành công.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
