<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('Backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->front_view = $request->front_view;
        $category->status = $request->status;
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/category/';
            $image->move($imagePath, $imageName);
            $category->image   = $imagePath . $imageName;
        }
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category Added Successfully!');
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
        $category = Category::findOrFail($id);
        return view('Backend.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->front_view = $request->front_view;
        $category->status = $request->status;
        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($category->image) && file_exists($category->image)) {
                unlink($category->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/category/';
            $image->move($imagePath, $imageName);

            $category->image   = $imagePath . $imageName;
        }
        $category->update();
        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if (!is_null($category->image) && file_exists($category->image)) {
            unlink($category->image);
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('delete', 'Category Deleted Successfully!');
    }
}
