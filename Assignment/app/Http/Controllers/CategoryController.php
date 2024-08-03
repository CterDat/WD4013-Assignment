<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // const PATH_VIEW = 'admin.category.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();
        $userType = auth()->check() ? auth()->user()->type : null;
        return view('admin.category.index', compact('categories', 'userType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('categories')->insert([
            'name' => $request->name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $data = Category::query()->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( String $id)
    {
        Category::query()->where('id', $id)->delete();
        return back();
    }
}
