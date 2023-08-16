<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    // Display a listing of the subcategories
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategories.index', compact('subcategories','categories'));
    }

    // Show the form for creating a new subcategory
    public function create()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories','subcategories'));
    }

    // Store a newly created subcategory in the database
    public function store(Request $request)
    {

        $request->validate([
               'category_id' => 'required',
                'name' => 'required|unique:subcategories',
                'code' => 'required|unique:subcategories',
                'description' => 'required',
   ]);


   $subcategory = new Subcategory();
   $subcategory->category_id =  $request->category_id;
   $subcategory->code = $request->code;
   $subcategory->name = $request->name;
   $subcategory->description = $request->description;

   $subcategory->save();
return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory created successfully.');
    }

    // Show the form for editing the specified subcategory
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    // Update the specified subcategory in the database
    public function update(Request $request, Subcategory $subcategory)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:subcategories,name,' . $subcategory->id,
            'code' => 'required|unique:subcategories,code,' . $subcategory->id,
            'description' => 'required',
            // Add any other validation rules for your subcategory attributes
        ]);

        $subcategory->update($data);

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory updated successfully.');
    }

    // Remove the specified subcategory from the database
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();


    }
}
