<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'code' => 'required|unique:categories',
            'description' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
   ]);
   $imagepath = handleUpload('category_image');

   $category = new Category();
   $category->category_image = $imagepath;
   $category->code = $request->code;
   $category->name = $request->name;
   $category->description = $request->description;

   $category->save();

toastr()->success("Category added successfully", 'success');
return redirect()->route('admin.category.index');
    }

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        $products = Product::all();
        return view('admin.categories.edit', compact('category','products'));
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'code' => 'required|unique:categories,code,' . $category->id,
            'description' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add any other validation rules for your category attributes
        ]);

        if ($request->hasFile('category_image')) {
            // Delete old image
            if ($category->category_image) {
                Storage::delete('public/' . $category->category_image);
            }
            $imagePath = $request->file('category_image')->store('category_images', 'public');
            $data['category_image'] = $imagePath;
        }

        $category->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database
    public function destroy(Category $category)
    {
        if ($category->category_image) {
            Storage::delete('public/' . $category->category_image);
        }

        $category->delete();

       
    }
}
