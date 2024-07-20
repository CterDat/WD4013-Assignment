<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listClothes = Product::query()->get();
        // return view('');
        return view('frontend.clothes.index', compact('listClothes'));
    }
    public function layout()
    {
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listTop5 = Product::query()->take(4)->get();
        // return view('');
        return view('frontend.clothes.top5', compact('listTop5'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $listTop5 = Product::query()->take(4)->get();
        // return view('');
        return view('frontend.clothes.top5', compact('listTop5'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $showClothes = $product;
        // $showClothes = Product::query()->where('id', $product)->first();
        return view('frontend.clothes.show', compact('showClothes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
