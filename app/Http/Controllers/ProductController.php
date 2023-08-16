<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.index', compact('products','categories'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'subcategories', 'brands'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {

      $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            // 'sku' => 'required|unique:products',
            'minimum_qty' => 'required|numeric',
            'quantity_description' => 'required',
            // 'tax' => 'required|numeric',
            'discount_type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $imagepath = handleUpload('product_image');

        $products = new Product();
        $products->product_image = $imagepath;

        $products->product_name = $request->product_name;
        $products->category = $request->category;
        $products->sub_category = $request->sub_category;
        $products->brand = $request->brand;
        $products->unit = $request->unit;
        $products->sku = $request->sku;
        $products->minimum_qty = $request->minimum_qty;
        $products->quantity_description = $request->quantity_description;
        $products->tax = $request->tax;
        $products->discount_type = $request->discount_type;
        $products->price = $request->price;
        $products->status = $request->status;

        $products->save();
        //  dd($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    // Display the specified product
    public function show(Product $product)
    {
        // return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit( $id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $product = Product::find($id);

        return view('admin.product.edit', compact('categories', 'subcategories', 'product','brands'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'minimum_qty' => 'required|numeric',
            'quantity_description' => 'required',
            'tax' => 'required|numeric',
            'discount_type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            // Delete old image
            if ($product->product_image) {
                Storage::delete('public/' . $product->product_image);
            }
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $data['product_image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete('public/' . $product->product_image);
        }

        $product->delete();

        // return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
