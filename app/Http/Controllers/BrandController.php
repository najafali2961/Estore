<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand; // Make sure to import the Brand model

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
    //   dd($request->all());
       

        $request->validate([
                 'name' => 'required|unique:brands',
                'description' => 'nullable',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagepath = handleUpload('image_path');

        $brand = new Brand();
        $brand->image_path = $imagepath;
        $brand->name = $request->name;
        $brand->description = $request->description;

        $brand->save();

toastr()->success("Brand added successfully", 'success');
return redirect()->route('admin.brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|unique:brands,name,' . $id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update brand image and data
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brand_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $brand->update($validatedData);

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();


        // return redirect()->route('admin.brand.index');
    }
}
