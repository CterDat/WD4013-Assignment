<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\UpdateBannerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::query()->get();
        $userType = auth()->check() ? auth()->user()->type : null;
        return view('admin.banner.index', compact('data', 'userType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $url = Storage::put('banner', $request->file('image'));
            // if (!empty($product->image) && Storage::exists($product->image)) {
            //     Storage::delete($product->image);
            // }
        } else {
            $url = '';
        }
        DB::table('banners')->insert([
            'image' => $url,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('banner.index')->with('success', 'Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        
        // return view('');
        return view('frontend.header.banner', compact('listTop3'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if (!empty($banner->image) && Storage::exists($banner->image)) {
            Storage::delete($banner->image);
        }
        $banner->delete();
        return back();
    }
}
