<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    const PATH_VIEW = 'admin.product.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userType = auth()->user()->type;
        $listClothes = Product::query()->get();
        return view('admin.product.index', compact('listClothes', 'userType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Product::query()->get();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $url = Storage::put('image', $request->file('image'));
        } else {
            $url = '';
        }
        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $url,
            'description' => $request->description,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('admin.index')->with('success', 'Thêm sách thành công');
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
    public function edit(Product $product, String $id)
    {
        $category = Product::query()->get();
        $data = Product::query()->where('id', $id)->first();
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Product $product)
    {
        if ($request->hasFile('image')) {
            $url = Storage::put('image', $request->file('image'));
            // if (!empty($product->image) && Storage::exists($product->image)) {
            //     Storage::delete($product->image);
            // }
        } else {
            $url = '';
        }
        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $url,
            'description' => $request->description,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('admin.index')->with('success', 'Thêm sách thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, String $id)
    {
        // if (!empty($product->image) && Storage::exists($product->image)) {
        // Storage::delete($product->image);
        // }
        Product::query()->where('id', $id)->delete();
        return back();
    }
}
